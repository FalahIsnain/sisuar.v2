<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModels extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat';
    protected $allowedFields =
    [
        'no_surat',
        'tujuan_surat',
        'perihal',
        'tanggal_keluar',
        'isi_ringkas',
        'file',
        'jenis_surat'
    ];

    public function hitungSuratKeluar()
    {
        return $this->db->table('surat_Keluar')->countAll();
    }
    public function filterDate($tglmin, $tglmax)
    {
        return $this->table('surat_keluar')->where('tanggal_keluar >=', $tglmin)->where('tanggal_keluar <=', $tglmax)->get();
    }
}
