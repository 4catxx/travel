<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class WisataModel extends Model
{
    protected $table = 'wisata';
    protected $primaryKey = 'id_wisata';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    
    protected $allowedFields = [
        'id_wisata',
        'nama_wisata',
        'deskripsi',
        'minimum_orang',
        'harga',
        'waktu_perjalanan',
        'rute_perjalanan',
        'gambar',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function getActiveWisata()
    {
        return $this->where('status', 'active')
                    ->findAll();
    }

    // Helper method to get wisata with details
    public function getWisataWithDetails($id_wisata)
    {
        return $this->where('id_wisata', $id_wisata)
                    ->first();
    }

    // Helper method for searching wisata
    public function searchWisata($keyword)
    {
        return $this->like('nama_wisata', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();
    }
}