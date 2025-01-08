<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\WisataModel;
use App\Models\RencanaPerjalananModel;

class UserController extends BaseController
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

    public function show_paket_wisata()
    {
    // Ambil data dari tabel wisata dengan status "Aktif"
    $wisataData = $this->wisataModel
        ->where('status', 'Aktif')
        ->findAll();

    // Kirim data ke view
    $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'Informasi Wisata']),
        'page_title' => view('partials/page-title', ['title' => 'Informasi Wisata', 'pagetitle' => 'Wisata']),
        'nama' => $this->session->get('nama'),
        'wisata' => $wisataData,
    ];
    return view('user/paket', $data);
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
    
        return view('user/detail-paket', $data);
    }

    
public function show_checkout($id_wisata = null)
{
    // Ambil ID wisata dari parameter URL
    $wisata = $this->wisataModel->find($id_wisata);

    // Validasi jika ID wisata tidak ada
    if (!$id_wisata) {
        return redirect()->to('paket')->with('error', 'Paket wisata tidak valid.');
    }

    // Ambil data wisata berdasarkan ID
    $wisata = $this->wisataModel->getWisataWithDetails($id_wisata);

    // Validasi jika wisata tidak ditemukan
    if (!$wisata) {
        return redirect()->to('paket')->with('error', 'Paket wisata tidak ditemukan.');
    }

    // Data yang akan dikirimkan ke view
    $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'Checkout']),
        'page_title' => view('partials/page-title', ['title' => 'Checkout', 'pagetitle' => 'Paket Wisata']),
        'nama' => $this->session->get('nama'),
        'email' => $this->session->get('email'),
        'wisata' => $wisata,
        'shipping' => 50000, 
    ];

    return view('user/checkout', $data);
}

    public function show_keranjang()
    {
        // Halaman untuk menambah wisata
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Keranjang']),
            'page_title' => view('partials/page-title', ['title' => 'Keranjang', 'pagetitle' => 'Keranjang']),
            'nama' => $this->session->get('nama')
        ];
        return view('user/keranjang', $data);
    }
}