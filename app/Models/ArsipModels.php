<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModels extends Model
{
    protected $table = 'arsip';
    protected $primaryKey = 'id_arsip';
    protected $allowedFields =
    [
        'nama_arsip',
        'tgl_arsip',
        'ket_arsip',
        'id_jenis',
        'file_arsip',
    ];

    public  function getArsip()
    {
        return $this->db->table('arsip')
            ->join('jenis_arsip', 'jenis_arsip.id_jenis=arsip.id_jenis')
            ->get()->getResultArray();
    }

    public  function getJenis()
    {
        return $this->db->table('jenis_arsip')
            ->get()->getResultArray();
    }

    public function hitungArsip()
    {
        return $this->db->table('arsip')->countAll();
    }
    public function filterDate($tglmin, $tglmax)
    {
        return $this->table('arsip')->where('tgl_arsip >=', $tglmin)->where('tgl_arsip <=', $tglmax)->get();
    }
}
