<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModels extends Model
{
    protected $table = 'jenis_arsip';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields =
    [
        'nama_jenis',
    ];
}
