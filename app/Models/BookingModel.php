<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    
    protected $allowedFields = [
        'id_user',
        'id_wisata',
        'no_tlp',
        'alamat',
        'created_at'
    ];
}