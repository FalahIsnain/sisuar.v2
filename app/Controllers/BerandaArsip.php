<?php

namespace App\Controllers;

use App\Models\ArsipModels;

class BerandaArsip extends BaseController
{
    protected $ArsipModels;

    public function __construct()
    {
        $this->ArsipModels = new ArsipModels();
    }

    public function index()
    {

        $data = [
            'title' => 'SISUAR BINKON',
            'arsip' => $this->ArsipModels->getArsip(),
            'jenis' => $this->ArsipModels->getJenis(),
        ];
        return view('arsip/dashboardarsip.php', $data);
    }
}
