<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\WisataModel;
use App\Models\RencanaPerjalananModel;

class AdminController extends BaseController
{
    protected $session;
    protected $userModel;
    protected $bookingModel;
    protected $wisataModel;
    protected $rencanaPerjalananModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->bookingModel = new BookingModel();
        $this->wisataModel = new WisataModel();
        $this->rencanaPerjalananModel = new RencanaPerjalananModel();
    }

    public function show_akun_aktif()
    {
        $users = $this->userModel->findAll();
        $userData = [];
        foreach ($users as $user) {
            $userData[] = [
                'nama' => $user['nama'],
                'email' => $user['email'],
                'tanggal_bergabung' => $user['created_at'],
                'jumlah_booking' => $this->bookingModel->where('id_user', $user['id_user'])->countAllResults()
            ];
        }
        // Halaman untuk menampilkan akun aktif
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Akun Aktif']),
            'page_title' => view('partials/page-title', ['title' => 'Akun Aktif', 'pagetitle' => 'Informasi Akun']),
            'nama' => $this->session->get('nama'),
            'users' => $userData
        ];
        return view('admin/akun-aktif', $data);
    }
    
    public function show_tambah_wisata()
    {
        // Halaman untuk menambah wisata
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Wisata']),
            'page_title' => view('partials/page-title', ['title' => 'Tambah Wisata', 'pagetitle' => 'Wisata']),
            'nama' => $this->session->get('nama')
        ];
        return view('admin/tambah-wisata', $data);
    }

    public function post_wisata()
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'nama_paket' => 'required|min_length[3]',
        'deskripsi' => 'required',
        'min' => 'required|numeric',
        'harga' => 'required|numeric',
        'waktu_perjalanan' => 'required|numeric',
        'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
    ]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Handle upload gambar
    $fileGambar = $this->request->getFile('gambar');
    if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
        $gambarName = $fileGambar->getRandomName();
        $fileGambar->move('uploads/wisata/', $gambarName);
    } else {
        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

    // Ambil data dari form
    $data = [
        'nama_wisata' => $this->request->getPost('nama_paket'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'minimum_orang' => $this->request->getPost('min'),
        'harga' => $this->request->getPost('harga'),
        'waktu_perjalanan' => $this->request->getPost('waktu_perjalanan'),
        'created_by' => $this->session->get('id_user'),
        'created_at' => date('Y-m-d H:i:s'),
        'gambar' => $gambarName,
    ];

    // Simpan data wisata dan ambil ID yang baru disimpan
    $this->wisataModel->insert($data);
    $wisataId = $this->wisataModel->getInsertID();  // Ambil ID yang baru saja disimpan

    if (!$wisataId) {
        return redirect()->back()->with('error', 'Gagal menyimpan data wisata.');
    }

    // Mengambil rencana perjalanan yang dinamis
    $jumlahHari = $this->request->getPost('waktu_perjalanan');
    
    for ($i = 1; $i <= $jumlahHari; $i++) {
        $waktuHari = $this->request->getPost("waktu_hari_{$i}[]");
        $kegiatanHari = $this->request->getPost("kegiatan_hari_{$i}[]");

        // Simpan rencana perjalanan per hari
        foreach ($waktuHari as $key => $waktu) {
            $rencanaData = [
                'id_wisata' => $wisataId,  // ID wisata yang baru saja disimpan
                'hari' => $i,
                'waktu' => $waktu,
                'kegiatan' => $kegiatanHari[$key],
            ];

            // Simpan ke tabel rencana perjalanan
            if (!$this->rencanaPerjalananModel->insert($rencanaData)) {
                return redirect()->back()->with('error', 'Gagal menyimpan rencana perjalanan.');
            }
        }
    }

    // Berhasil menyimpan semua data
    return redirect()->to('informasi-wisata')->with('success', 'Data wisata berhasil ditambahkan.');
}

    public function show_edit_wisata($id_wisata)
    {
        // Ambil data wisata berdasarkan ID
        $wisata = $this->wisataModel->find($id_wisata);
    
        if (!$wisata) {
            // Jika data tidak ditemukan, redirect ke halaman wisata dengan pesan error
            return redirect()->to('informasi-wisata')->with('error', 'Data wisata tidak ditemukan.');
        }
    
        // Kirim data wisata ke view
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Wisata']),
            'page_title' => view('partials/page-title', ['title' => 'Edit Wisata', 'pagetitle' => 'Wisata']),
            'nama' => $this->session->get('nama'),
            'wisata' => $wisata // Kirim data wisata ke view
        ];
    
        return view('admin/edit-wisata', $data);
    }

    public function post_update_wisata()
    {
    $id_wisata = $this->request->getPost('id_wisata');

    $data = [
        'nama_wisata' => $this->request->getPost('nama_paket'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'minimum_orang' => $this->request->getPost('minimum_orang'),
        'harga' => $this->request->getPost('harga'),
        'waktu_perjalanan' => $this->request->getPost('waktu_perjalanan'),
        'rute_perjalanan' => $this->request->getPost('rute_perjalanan'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    // Cek jika ada file gambar diupload
    $gambar = $this->request->getFile('gambar');
    if ($gambar && $gambar->isValid()) {
        $gambar->move('uploads/wisata', $gambar->getName());
        $data['gambar'] = $gambar->getName();
    }

    $this->wisataModel->update($id_wisata, $data);

    return redirect()->to('/informasi-wisata')->with('success', 'Data wisata berhasil diperbarui.');
    }

    public function show_informasi_wisata()
{
    // Ambil semua data dari tabel wisata
    $wisataData = $this->wisataModel->findAll();

    // Ambil rencana perjalanan yang terkait dengan setiap wisata
    $rencanaPerjalananData = [];
    foreach ($wisataData as $wisata) {
        $rencanaPerjalananData[$wisata['id_wisata']] = $this->rencanaPerjalananModel
            ->where('id_wisata', $wisata['id_wisata'])
            ->orderBy('hari', 'ASC')
            ->findAll();
    }

    // Kirim data ke view
    $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'Informasi Wisata']),
        'page_title' => view('partials/page-title', ['title' => 'Informasi Wisata', 'pagetitle' => 'Wisata']),
        'nama' => $this->session->get('nama'),
        'wisata' => $wisataData,
        'rencana_perjalanan' => $rencanaPerjalananData,  // Data rencana perjalanan per wisata
    ];

    return view('admin/informasi-wisata', $data);
}

    

public function show_detail_paket($id_wisata)
{
    // Fetch wisata data by ID
    $wisata = $this->wisataModel->find($id_wisata);
    
    if (!$wisata) {
        // Handle case when wisata is not found
        return redirect()->to('informasi-wisata')->with('error', 'Paket wisata tidak ditemukan');
    }

    // Fetch rencana perjalanan data based on wisata ID
    $rencanaPerjalanan = $this->rencanaPerjalananModel
        ->where('id_wisata', $id_wisata)
        ->orderBy('hari', 'ASC')
        ->findAll();

    // Prepare data to be passed to view
    $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'Detail Paket Wisata']),
        'page_title' => view('partials/page-title', ['title' => 'Detail Paket Wisata', 'pagetitle' => 'Paket Wisata']),
        'nama' => $this->session->get('nama'),
        'wisata' => $wisata, // Pass wisata data to view
        'rencana_perjalanan' => $rencanaPerjalanan // Pass rencana perjalanan to view
    ];

    return view('Admin/detail-paket', $data);
}


public function post_ubah_status()
{
    // Ambil input dari form
    $id_wisata = $this->request->getPost('id_wisata');
    $status = $this->request->getPost('status');

    // Validasi input
    if (!in_array($status, ['Aktif', 'Tidak Aktif'])) {
        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    // Update status di database
    $update = $this->wisataModel->update($id_wisata, ['status' => $status]);

    if ($update) {
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Gagal memperbarui status.');
    }
}
    
}
