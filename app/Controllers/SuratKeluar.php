<?php

namespace App\Controllers;

use App\Models\SuratKeluarModels;
use App\Models\SuratMasukModels;
use App\Models\SuratTugasModels;

class SuratKeluar extends BaseController
{
    protected $SuratKeluarModels;

    public function __construct()
    {
        $this->SuratKeluarModels = new SuratKeluarModels();
    }
    public function index()
    {
        $data = [
            'title' => 'SISUAR',
            'suratkeluar' => $this->SuratKeluarModels->findAll(),
        ];

        return view('surat/suratkeluar/indexsuratkeluar.php', $data);
    }
    public function tambahSuratKeluar()
    {

        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'no_surat' => [
                    'rules' => 'is_unique[surat_keluar.no_surat]',
                    'errors' => [
                        'is_unique'    => 'No Surat sudah terdata !!!'
                    ]
                ],

            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('/SuratKeluar'));
            } else {
                $file = $this->request->getFile('file');
                $file->move('asset/pdf');
                $namaFile = $file->getName();
                $dataSuratKeluar = [
                    'no_surat' => $this->request->getVar('no_surat'),
                    'tujuan_surat' => $this->request->getVar('tujuan_surat'),
                    'perihal' => $this->request->getVar('perihal'),
                    'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                    'jenis_surat' => 'Keluar',
                    'file' => $namaFile,
                ];
                $this->SuratKeluarModels->save($dataSuratKeluar);
                return redirect()->to(base_url('/SuratKeluar'));
            }
        } else {
            return redirect()->to(base_url('/SuratKeluar'));
        }
    }

    public function hapusSuratKeluar()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        //Cari File berdasarkan Id
        $hapusFile = $this->SuratKeluarModels->find($id);

        // Hapus file
        unlink('asset/pdf/' . $hapusFile['file']);
        $this->SuratKeluarModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/SuratKeluar'));
    }

    public function edit($id_surat)
    {
        $file = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            $file->move('asset/pdf');
            $namaFile = $file->getName();
            unlink('asset/pdf/' . $this->request->getVar('fileLama'));
        }
        $this->SuratKeluarModels->update($id_surat, [
            'no_surat' => $this->request->getVar('no_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'isi_ringkas' => $this->request->getVar('isi_ringkas'),
            'jenis_surat' => 'Keluar',
            'file' => $namaFile,
        ]);


        return redirect()->to(base_url('/SuratKeluar'));
    }


    public function formfilter()
    {

        helper(['form', 'url']);
        $data = [
            'title' => 'SISUAR',
            'validation' => \Config\Services::validation(),

        ];
        return view('surat/suratkeluar/filtersuratkeluar.php', $data);
    }

    public function cetakFilterSuratKeluar()
    {
        $tglmin = $this->request->getPost('tanggal_min');
        $tglmax = $this->request->getPost('tanggal_max');
        $data = [
            'title' => 'Filter Surat Keluar',
            'dataFilter' => $this->SuratKeluarModels->filterDate($tglmin, $tglmax),
            'tanggalMin' => date('d-M-Y', strtotime($tglmin)),
            'tanggalMax' => date('d-M-Y', strtotime($tglmax)),
        ];
        return view('surat/suratkeluar/cetakfiltersuratkeluar.php', $data);
    }
}
