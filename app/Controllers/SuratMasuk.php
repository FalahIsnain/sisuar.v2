<?php

namespace App\Controllers;

use App\Models\SuratKeluarModels;
use App\Models\SuratMasukModels;
use App\Models\SuratTugasModels;
use App\Models\DisposisiModels;

class SuratMasuk extends BaseController
{
    protected $SuratMasukModels;
    protected $SuratKeluarModels;
    protected $SuratTugasModels;
    protected $DisposisiModels;

    public function __construct()
    {
        $this->SuratMasukModels = new SuratMasukModels();
        $this->DisposisiModels = new DisposisiModels();
    }

    public function index()
    {
        $id = $this->request->uri->getSegment(2);
        helper(['form', 'url']);
        $jumlahRecord = $this->SuratMasukModels->where('id_surat', $id)->countAllResults();

        $data = [
            'suratMasukWrn' => '#F6F3A7',
            'suratKeluarWrn' => '#F6C523',
            'suratTugasWrn' => '#228C7B',
            'title' => 'SISUAR',
            'suratmasuk' => $this->SuratMasukModels->findAll(),
            'validation' => \Config\Services::validation(),

        ];
        return view('surat/suratmasuk/indexsuratmasuk.php', $data);
    }

    public function tambahSuratMasuk()
    {
        helper(['form', 'url']);
        $fileUp = $this->request->getFile('file');
        $namaFile = $fileUp->getName();
        $fileUp->move('asset/pdf', $namaFile);
        $dataSuratMasuk = [
            'no_surat' => $this->request->getVar('no_surat'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'isi_ringkas' => "-",
            'ket_surat' => $this->request->getVar('ket_surat'),
            'alasan' => $this->request->getVar('alasan'),
            'jenis_surat' => 'Masuk',
            'file' =>  $namaFile,
        ];
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        $this->SuratMasukModels->save($dataSuratMasuk);
        return redirect()->to(base_url('/SuratMasuk'));
    }

    public function hapusSuratMasuk()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        //Cari File berdasarkan Id
        $hapusFile = $this->SuratMasukModels->find($id);

        // Hapus file
        unlink('asset/pdf/' . $hapusFile['file']);
        $this->SuratMasukModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/SuratMasuk'));
        echo json_encode(array("status" => TRUE));
    }

    public function edit($id_surat)
    {

        $file = $this->request->getFile('file');
        // cek File 
        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            $namaFile = $file->getName();
            $file->move('asset/pdf', $namaFile);
            unlink('asset/pdf/' . $this->request->getVar('fileLama'));
        }
        $this->SuratMasukModels->update($id_surat, [
            'no_surat' => $this->request->getVar('no_surat'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'isi_ringkas' => $this->request->getVar('isi_ringkas'),
            'ket_surat' => $this->request->getVar('ket_surat'),
            'alasan' => "-",
            'jenis_surat' => 'Masuk',
            'file' => $namaFile,
        ]);

        return redirect()->to(base_url('/SuratMasuk'));
    }


    public function formfilter()
    {

        helper(['form', 'url']);


        $data = [
            'title' => 'SISUAR',
            'validation' => \Config\Services::validation(),

        ];
        return view('surat/suratmasuk/filtersuratmasuk.php', $data);
    }

    public function cetakFilterSuratMasuk()
    {
        $tglmin = $this->request->getPost('tanggal_min');
        $tglmax = $this->request->getPost('tanggal_max');

        $data = [
            'title' => 'Filter Surat Masuk',
            'dataFilter' => $this->SuratMasukModels->filterDate($tglmin, $tglmax),
            'tanggalMin' => date('d-M-Y', strtotime($tglmin)),
            'tanggalMax' => date('d-M-Y', strtotime($tglmax)),
        ];
        return view('surat/suratmasuk/cetakfiltersuratmasuk.php', $data);
    }

    public function disposisi($id_surat)
    {

        helper(['form', 'url']);
        $data = [
            'suratMasukWrn' => '#F6F3A7',
            'suratKeluarWrn' => '#F6C523',
            'suratTugasWrn' => '#228C7B',
            'title' => 'SISUAR',
            'detailSurat' => $this->SuratMasukModels->getOne($id_surat),
            'disposisiCetak' => $this->DisposisiModels->getDisposisi($id_surat),
            'validation' => \Config\Services::validation(),
        ];
        return view('surat/suratmasuk/disposisi.php', $data);
    }

    public function tambahDisposisi()
    {
        helper(['form', 'url']);
        $id_surat =  $this->request->getPost('id_surat');
        $size_arr = $this->request->getPost('arrDisposisi[]');
        $disposisiString = implode(" \n ", $size_arr);

        $dataDisposisi = [
            'id_surat' => $this->request->getPost('id_surat'),
            'dari' => $this->request->getPost('dari'),
            'kepada' => $this->request->getPost('kepada'),
            'ket' => $this->request->getPost('keterangan'),
            'disposisi' => $disposisiString
        ];
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        $this->DisposisiModels->save($dataDisposisi);
        return redirect()->to(base_url('/SuratMasuk/disposisi/' . $id_surat));
    }
    public function tabelDisposisi()
    {
        helper(['form', 'url']);
        $data = [
            'title' => 'SISUAR',
            'suratdisposisi' => $this->SuratMasukModels->where('ket_surat', 'Ya')->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        return view('surat/suratmasuk/indexsuratdisposisi.php', $data);
    }
}
