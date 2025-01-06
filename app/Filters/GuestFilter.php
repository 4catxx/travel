<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();

        // Cek apakah user sudah login
        if ($session->get('isLoggedIn')) {
            // Jika sudah login, arahkan ke beranda sesuai role
            $role = $session->get('role');
            
            switch($role) {
                case '1':
                    return redirect()->to('/beranda');
                case '2':
                    return redirect()->to('/beranda');
                default:
                    return redirect()->to('/login');
            }
        }

        // Jika belum login, lanjutkan
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah
    }
}