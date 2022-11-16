<?php

namespace App\Controllers;

use App\Models\ArsipModels;

class FilterArsip extends BaseController
{
    protected $ArsipModels;

    public function __construct()
    {
        $this->ArsipModels = new ArsipModels();
    }

    public function index()
    {
        $jenis = $this->request->getPost('filterJenis');
        $data = [
            'title' => 'Filter Surat Masuk',
            'dataFilterJenis' => $this->ArsipModels->filterJenis($jenis),
            'jenis' => $this->ArsipModels->getJenis(),
        ];
        return view('arsip/cetakfilterjenisarsip.php', $data);
    }
    
}
