<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    protected $userModel;
    protected $throttler;
    

    public function __construct()
    {
    $this->userModel = new UserModel();
    $this->throttler = \Config\Services::throttler();
    $this->session = \Config\Services::session();
    helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Login'])
        ];
        return view('login/index', $data);
    }

    public function login()
{
    // Tangkap input dari form
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('userpassword');

    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'username' => 'required',
        'userpassword' => 'required'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Cari user berdasarkan username
    $user = $this->userModel->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Login berhasil
        $sessionData = [
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        $this->session->set($sessionData);

        // Redirect ke beranda
        return redirect()->to('/beranda');
    } else {
        // Login gagal
        return redirect()->back()
            ->withInput()
            ->with('error', 'Username atau password salah');
    }
}

    public function register()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Register']),
            'validation' => \Config\Services::validation()
        ];
        return view('login/register', $data);
    }

    public function post_register()
    {
        // Rate limiting check
        if (!$this->throttler->check('registration', 3, 300)) {
            return redirect()->back()
                ->with('error', 'Terlalu banyak percobaan. Silakan tunggu beberapa menit.');
        }

        // Validation rules
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama lengkap harus diisi',
                    'min_length' => 'Nama minimal 3 karakter'
                ]
            ],
            'useremail' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'min_length' => 'Username minimal 3 karakter',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'userpassword' => [
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter',
                    'regex_match' => 'Password harus mengandung huruf besar, huruf kecil, dan angka'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[userpassword]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Password tidak cocok'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        try {
            $this->userModel->save([
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('useremail'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('userpassword'),
                'role' => '2'
            ]);

            return redirect()->to('/login')
                ->with('success', 'Akun berhasil dibuat. Silakan login.');
        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat membuat akun. Silakan coba lagi.');
        }
    }

    public function lupapassword()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Lupa Password'])
        ];
        return view('login/lupapassword', $data);
    }

    public function logout()
{
    // Hapus session
    $this->session->destroy();
    
    // Redirect ke halaman login
    return redirect()->to('/login');
}
}