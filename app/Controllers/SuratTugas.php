<?php

namespace App\Controllers;

use App\Models\SuratKeluarModels;
use App\Models\SuratMasukModels;
use App\Models\SuratTugasModels;

class SuratTugas extends BaseController
{
    protected $SuratMasukModels;
    protected $SuratKeluarModels;
    protected $SuratTugasModels;

    public function __construct()
    {
        $this->SuratKeluarModels = new SuratKeluarModels();
        $this->SuratMasukModels = new SuratMasukModels();
        $this->SuratTugasModels = new SuratTugasModels();
    }

    public function index()
    {
        $data = [
            'suratMasukWrn' => '#F6F3A7',
            'suratKeluarWrn' => '#F6C523',
            'suratTugasWrn' => '#228C7B',
            'title' => 'SISUAR BINKON',
            'surattugas' => $this->SuratTugasModels->findAll(),
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas()
        ];
        return view('surat/surattugas/indexsurattugas.php', $data);
    }

    public function tambahSuratTugas()
    {

        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'no_surat' => [
                    'rules' => 'is_unique[surat_tugas.no_surat]',
                    'errors' => [
                        'is_unique'    => 'No Surat sudah terdata !!!'
                    ]
                ],

            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('/SuratTugas'));
            } else {
                $file = $this->request->getFile('file');
                $file->move('asset/pdf');
                $namaFile = $file->getName();
                $dataSuratTugas = [
                    'no_surat' => $this->request->getVar('no_surat'),
                    'keperluan' => $this->request->getVar('keperluan'),
                    'tempat_tujuan' => $this->request->getVar('tempat_tujuan'),
                    'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                    'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
                    'beban_biaya' => $this->request->getVar('beban_biaya'),
                    'alat_angkut' => $this->request->getVar('alat_angkut'),
                    'tgl_rilis' => $this->request->getVar('tgl_rilis'),
                    'jenis_surat' => "Tugas",
                    'file' => $namaFile,
                ];
                $this->SuratTugasModels->save($dataSuratTugas);
                session()->setFlashdata('pesan', 'data berhasil di tambah');
                return redirect()->to(base_url('/SuratTugas'));
            }
        } else {
            return redirect()->to(base_url('/SuratTugas'));
        }
    }

    public function hapusSuratTugas()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        //Cari File berdasarkan Id
        $hapusFile = $this->SuratTugasModels->find($id);

        // Hapus file
        unlink('asset/pdf/' . $hapusFile['file']);
        $this->SuratTugasModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/SuratTugas'));
    }

    public function edit($id_surat)
    {

        $file = $this->request->getFile('file');
        // cek File 
        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            $file->move('asset/pdf');
            $namaFile = $file->getName();
            unlink('asset/pdf/' . $this->request->getVar('fileLama'));
        };

        $this->SuratTugasModels->update($id_surat, [
            'no_surat' => $this->request->getVar('no_surat'),
            'keperluan' => $this->request->getVar('keperluan'),
            'tempat_tujuan' => $this->request->getVar('tempat_tujuan'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'beban_biaya' => $this->request->getVar('beban_biaya'),
            'alat_angkut' => $this->request->getVar('alat_angkut'),
            'tgl_rilis' => $this->request->getVar('tgl_rilis'),
            'jenis_surat' => "Tugas",
            'file' => $namaFile,
        ]);
        return redirect()->to(base_url('/SuratTugas'));
    }
    public function formfilter()
    {

        helper(['form', 'url']);
        $data = [
            'title' => 'SISUAR BINKON',
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas(),
            'validation' => \Config\Services::validation(),

        ];
        return view('surat/surattugas/filtersurattugas.php', $data);
    }

    public function cetakFilterSuratTugas()
    {
        $tglmin = $this->request->getPost('tanggal_min');
        $tglmax = $this->request->getPost('tanggal_max');
        $data = [
            'title' => 'Filter Surat Keluar',
            'dataFilter' => $this->SuratTugasModels->filterDate($tglmin, $tglmax),
            'tanggalMin' => date('d-M-Y', strtotime($tglmin)),
            'tanggalMax' => date('d-M-Y', strtotime($tglmax)),
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas(),
        ];
        return view('surat/surattugas/cetakfiltersurattugas.php', $data);
    }
}
