<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'SISUAR BINKON',

        ];

        return view('HalamanAwal/home', $data);
    }
}
