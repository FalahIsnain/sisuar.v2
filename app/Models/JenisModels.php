<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModels extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields =
    [
        'jenis_surat',
    ];
}
