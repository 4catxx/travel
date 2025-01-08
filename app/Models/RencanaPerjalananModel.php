<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class RencanaPerjalananModel extends Model
{
    protected $table = 'rencana_perjalanan';
    protected $primaryKey = 'id_perjalanan';  // Primary key menggunakan id_perjalanan
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Definisikan properti yang dapat diisi
    protected $allowedFields = ['id_wisata', 'hari', 'waktu', 'kegiatan'];

    // Menambahkan relasi ke WisataModel jika diperlukan
    public function wisata()
    {
        return $this->belongsTo(WisataModel::class, 'id_wisata', 'id_wisata'); // Relasi dengan id_wisata
    }
}
