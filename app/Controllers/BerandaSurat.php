<?php

namespace App\Controllers;

use App\Models\SuratKeluarModels;
use App\Models\SuratMasukModels;
use App\Models\SuratTugasModels;


class BerandaSurat extends BaseController
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
            'title' => 'SISUAR',
            'suratMasukWrn' => '#EC7272',
            'suratKeluarWrn' => '#FFC93C ',
            'suratTugasWrn' => '#63B4B8',
            'suratDisposisiWrn' => '#AD8B73 ',
            'btnPrimary' => '#874C62',
            'suratmasuk' => $this->SuratMasukModels->findAll(),
            'suratkeluar' => $this->SuratKeluarModels->findAll(),
            'surattugas' => $this->SuratTugasModels->findAll(),
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas(),
            'jumlahSuratDisposisi' => $this->SuratMasukModels->hitungSuratDisposisi(),
        ];

        return view('surat/dashboardsurat.php', $data);
    }
    public function tambahSuratMasukDashboard()
    {
        $file = $this->request->getFile('file');
        $namaFile = $file->getName();
        $file->move('asset/pdf', $namaFile);
        $dataSuratMasuk = [
            'no_surat' => $this->request->getVar('no_surat'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'isi_ringkas' => "-",
            'ket_surat' => $this->request->getVar('ket_surat'),
            'alasan' =>"-",
            'jenis_surat' => 'Surat Masuk',
            'file' =>  $namaFile,
        ];
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        $this->SuratMasukModels->save($dataSuratMasuk);
        return redirect()->to(base_url('/BerandaSurat'));
    }
    public function tambahSuratKeluarDashboard()
    {
        $file = $this->request->getFile('file');
        $namaFile = $file->getName();
        $file->move('asset/pdf', $namaFile);
        $dataSuratKeluar = [

            'no_surat' => $this->request->getVar('no_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'isi_ringkas' => "-",
            'jenis_surat' => 'Surat Keluar',
            'file' => $namaFile,
        ];
        $this->SuratKeluarModels->save($dataSuratKeluar);
        return redirect()->to(base_url('/BerandaSurat'));
    }
    public function tambahSuratTugasDashboard()
    {
        $file = $this->request->getFile('file');
        $namaFile = $file->getName();
        $file->move('asset/pdf', $namaFile);
        $dataSuratTugas = [

            'no_surat' => $this->request->getVar('no_surat'),
            'keperluan' => $this->request->getVar('keperluan'),
            'tempat_tujuan' => $this->request->getVar('tempat_tujuan'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'beban_biaya' => $this->request->getVar('beban_biaya'),
            'tgl_rilis' => $this->request->getVar('tgl_rilis'),
            'jenis_surat' => "Tugas",
            'file' => $namaFile,
        ];
        $this->SuratTugasModels->save($dataSuratTugas);
        return redirect()->to(base_url('/BerandaSurat'));
    }

    public function hapusSuratMasukDashboard()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        $this->SuratMasukModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/BerandaSurat'));
    }

    public function hapusSuratKeluarDashboard()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        $this->SuratKeluarModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/BerandaSurat'));
    }

    public function hapusSuratTugasDashboard()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        $this->SuratTugasModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/BerandaSurat'));
    }
}
