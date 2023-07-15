<?php

namespace App\Controllers;

class Index extends BaseController
{
    public function index()
    {
        
    }

    public function dashboard()
    {
        $data = [
            'judulHalaman' => 'Dashboard'
        ];
        return view('pages/dashboard', $data);
    }

    public function mahasiswa()
    {
        $data = [
            'judulHalaman' => 'Mahasiswa'
        ];
        return view('pages/mahasiswa', $data);
    }
}
