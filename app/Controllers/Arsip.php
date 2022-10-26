<?php

namespace App\Controllers;

use App\Models\ArsipModels;
use App\Models\JenisModels;

class Arsip extends BaseController
{
    protected $ArsipModels;

    public function __construct()
    {
        $this->ArsipModels = new ArsipModels();
        $this->JenisModels = new JenisModels();
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
        $fileUp->move('asset/pdf');
        $namaFile = $fileUp->getName();
        $dataArsip = [
            'nama_arsip' => $this->request->getVar('nama_arsip'),
            'tgl_arsip' => $this->request->getVar('tgl_arsip'),
            'ket_arsip' => $this->request->getVar('ket_arsip'),
            'id_jenis' => $this->request->getVar('jenis'),
            'file_arsip' =>  $namaFile,
        ];
        $this->ArsipModels->save($dataArsip);
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        return redirect()->to(base_url('/Arsip'));
    }

    public function hapusArsip()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        $hapusFile = $this->ArsipModels->find($id);

        // Hapus file
        unlink('asset/pdf/' . $hapusFile['file_arsip']);
        $this->ArsipModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/Arsip'));
    }

    public function edit($id_arsip)
    {

        $file = $this->request->getFile('file_arsip');
        // cek File 
        if ($file->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            $file->move('asset/pdf');
            $namaFile = $file->getName();
            unlink('asset/pdf/' . $this->request->getVar('fileLama'));
        }
        $this->ArsipModels->update($id_arsip, [
            'nama_arsip' => $this->request->getVar('nama_arsip'),
            'tgl_arsip' => $this->request->getVar('tgl_arsip'),
            'ket_arsip' => $this->request->getVar('ket_arsip'),
            'id_jenis' => $this->request->getVar('jenis'),
            'file_arsip' =>  $namaFile,
        ]);
        session()->setFlashdata('pesan', 'data berhasil di edit');
        return redirect()->to(base_url('/Arsip'));
    }


    public function formfilter()
    {

        helper(['form', 'url']);


        $data = [
            'title' => 'SISUAR',
            'validation' => \Config\Services::validation(),

        ];
        return view('arsip/filterarsip.php', $data);
    }

    public function cetakFilterArsip()
    {
        $tglmin = $this->request->getPost('tanggal_min');
        $tglmax = $this->request->getPost('tanggal_max');

        $data = [
            'title' => 'Filter Surat Masuk',
            'dataFilter' => $this->ArsipModels->filterDate($tglmin, $tglmax),
            'tanggalMin' => date('d-M-Y', strtotime($tglmin)),
            'tanggalMax' => date('d-M-Y', strtotime($tglmax)),
        ];
        
        return view('arsip/cetakfilterarsip.php', $data);
    }

    public function indexJenis()
    {
        helper(['form', 'url']);

        $data = [
            'title' => 'SISUAR',
            'jenis' => $this->ArsipModels->getJenis(),
            'validation' => \Config\Services::validation(),

        ];
        return view('arsip/indexjenis.php', $data);
    }

    public function tambahJenis()
    {
        $datajenis = [
            'nama_jenis' => $this->request->getVar('nama_jenis'),
        ];
        $this->JenisModels->save($datajenis);
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        return redirect()->to(base_url('/Arsip/indexJenis'));
    }

    public function hapusJenis()
    {
        try {
            $id = $this->request->uri->getSegment(3);
            $this->JenisModels->delete($id);
            session()->setFlashdata('pesan', 'data berhasil di hapus');
            return redirect()->to(base_url('/Arsip/indexJenis'));
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'jenis masih ada, pastikan sudah habis');
            return redirect()->to(base_url('/Arsip/indexJenis'));
            die($e->getMessage());
        }
    }

    public function editJenis($id_jenis)
    {
        try {
            $this->JenisModels->update($id_jenis, [
                'nama_jenis' => $this->request->getVar('nama_jenis'),
            ]);
            session()->setFlashdata('pesan', 'data berhasil di edit');
            return redirect()->to(base_url('/Arsip/indexJenis'));
        } catch (\Exception $e) {
            session()->setFlashdata('pesan', 'jenis masih ada, pastikan sudah habis');
            return redirect()->to(base_url('/Arsip/indexJenis'));
            die($e->getMessage());
        }
    }
}
