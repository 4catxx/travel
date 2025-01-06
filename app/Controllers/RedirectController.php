<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\WisataModel;

class RedirectController extends BaseController
{
    protected $session;
    protected $wisataModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->wisataModel = new WisataModel();
    }

    public function index()
    {
        // Dapatkan role dari session
        $role = $this->session->get('role');

        // Redirect berdasarkan role
        switch($role) {
            case '1':
                return $this->adminBeranda();
            case '2':
                return $this->userBeranda();
            default:
                return redirect()->to('/login');
        }
    }

    private function adminBeranda()
    {
        // Pastikan hanya role 1 yang bisa akses
        if ($this->session->get('role') !== '1') {
            return redirect()->to('/beranda');
        }

        // Total semua wisata
        $totalWisata = $this->wisataModel->countAllResults();

        // Total wisata bulan ini
        $currentMonth = date('Y-m');
        $totalWisataThisMonth = $this->wisataModel
            ->where("DATE_FORMAT(created_at, '%Y-%m')", $currentMonth)
            ->countAllResults();

        // Total wisata bulan lalu
        $lastMonth = date('Y-m', strtotime('-1 month'));
        $totalWisataLastMonth = $this->wisataModel
            ->where("DATE_FORMAT(created_at, '%Y-%m')", $lastMonth)
            ->countAllResults();

        // Hitung perubahan (arrow up/down)
        $arrow = '';
        if ($totalWisataThisMonth > $totalWisataLastMonth) {
            $arrow = 'up';
        } elseif ($totalWisataThisMonth < $totalWisataLastMonth) {
            $arrow = 'down';
        }

        // Data yang dikirim ke view
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Beranda']),
            'page_title' => view('partials/page-title', ['title' => 'Beranda', 'pagetitle' => 'Beranda']),
            'nama' => $this->session->get('nama'),
            'totalWisata' => $totalWisata,
            'arrow' => $arrow
        ];

        return view('admin/index', $data);
    }

    private function userBeranda()
    {
        // Pastikan hanya role 2 yang bisa akses
        if ($this->session->get('role') !== '2') {
            return redirect()->to('/beranda');
        }

        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Beranda User']),
            'page_title' => view('partials/page-title', ['title' => 'Beranda', 'pagetitle' => 'Beranda']),
            'nama' => $this->session->get('nama')
        ];
        return view('user/index', $data);
    }
}