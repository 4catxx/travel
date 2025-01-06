<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();

        // Cek apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Jika ada argumen role, cek role
        if ($arguments && isset($arguments[0])) {
            $userRole = $session->get('role');
            if ($userRole != $arguments[0]) {
                // Redirect ke halaman akses ditolak
                return redirect()->to('/beranda')->with('error', 'Akses ditolak.');
            }
        }        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah
    }
}