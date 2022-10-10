<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratTugasModels extends Model
{
    protected $table = 'surat_Tugas';
    protected $primaryKey = 'id_surat';
    protected $allowedFields = 
    ['no_surat',
     'keperluan',
     'tempat_tujuan', 
     'tanggal_mulai', 
     'tanggal_selesai', 
     'beban_biaya', 
     'alat_angkut', 
     'tgl_rilis',
     'file',
     'jenis_surat'
    ];

    public function hitungSuratTugas()
    {
        return $this->db->table('surat_tugas')->countAll();
    }
    public function filterDate($tglmin, $tglmax)
    {
        return $this->table('surat_tugas')->where('tgl_rilis >=', $tglmin)->where('tgl_rilis <=', $tglmax)->get();
    }
}
