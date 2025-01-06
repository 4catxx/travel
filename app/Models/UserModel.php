<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    
    protected $allowedFields = [
        'username', 
        'password', 
        'nama', 
        'email', 
        'role', 
        'created_at', 
        'updated_at'
    ];

    protected $validationRules = [
        'username' => 'required|min_length[3]|is_unique[user.username,id,{id}]',
        'email' => 'required|valid_email|is_unique[user.email,id,{id}]',
        'password' => 'required|min_length[8]',
        'nama' => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username harus diisi',
            'min_length' => 'Username minimal 3 karakter',
            'is_unique' => 'Username sudah digunakan'
        ],
        'email' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Format email tidak valid',
            'is_unique' => 'Email sudah terdaftar'
        ],
        'password' => [
            'required' => 'Password harus diisi',
            'min_length' => 'Password minimal 8 karakter'
        ],
        'nama' => [
            'required' => 'Nama lengkap harus diisi',
            'min_length' => 'Nama minimal 3 karakter'
        ]
    ];

    protected $beforeInsert = ['hashPassword', 'setCreatedAt'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    protected function setCreatedAt(array $data)
    {
        // Gunakan waktu saat ini jika tidak ada created_at yang ditentukan
        $data['data']['created_at'] = $data['data']['created_at'] ?? Time::now()->toDateTimeString();
        $data['data']['updated_at'] = $data['data']['updated_at'] ?? Time::now()->toDateTimeString();
        return $data;
    }
}