<?php

namespace App\Controllers;

use App\Models\ArsipModels;

class Arsip extends BaseController
{
    protected $ArsipModels;

    public function __construct()
    {
        $this->ArsipModels = new ArsipModels();
    }

    public function index()
    {
        helper(['form', 'url']);

        $data = [
            'title' => 'SISUAR',
            'arsip' => $this->ArsipModels->getArsip(),
            'jenis' => $this->ArsipModels->getJenis(),
            'validation' => \Config\Services::validation(),

        ];
        return view('arsip/indexarsip.php', $data);
    }
    

    public function tambahArsip()
    {
        helper(['form', 'url']);
        $fileUp = $this->request->getFile('file_arsip');
        $namaFile = $fileUp->getName();
        $fileUp->move('asset/pdf', $namaFile);
        $dataArsip = [
            'nama_arsip' => $this->request->getVar('nama_arsip'),
            'tgl_arsip' => $this->request->getVar('tgl_arsip'),
            'ket_arsip' => $this->request->getVar('ket_arsip'),
            'id_jenis ' => $this->request->getVar('jenis'),
            'file_arsip' =>  $namaFile,
        ];
        $this->ArsipModels->save($dataArsip);
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        return redirect()->to(base_url('/Arsip'));
    }

    public function hapusSuratMasuk()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
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
