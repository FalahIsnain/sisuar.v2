<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModels extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'id_disposisi';
    protected $allowedFields =
    [
        'id_disposisi',
        'id_surat',
        'dari',
        'kepada',
        'ket',
        'disposisi'
    ];
    public function getDisposisi($idSurat)
    {
        return $this->table('surat_masuk')->where('id_surat', $idSurat)->get();
    }
}
