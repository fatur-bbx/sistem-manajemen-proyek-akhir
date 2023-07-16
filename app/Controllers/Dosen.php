<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Dosen extends BaseController
{
    public $penggunaModel;
    public $session;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'judulHalaman' => 'Dosen',
            'pengguna' => $this->penggunaModel->getAllPengguna(),
            'session' => $this->session,
        ];
        return view('pages/dosen', $data);
    }

    public function tambah()
    {
        $data = [
            "nama" => $_POST["nama"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "level" => $_POST["level"]
        ];

        $this->penggunaModel->createPengguna($data);
        return redirect()->to('/dosen');
    }

    public function ubah()
    {
        $data = [
            "id_pengguna" => $_POST["id_pengguna"],
            "nama" => $_POST["nama"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "level" => $_POST["level"]
        ];

        $this->penggunaModel->updatePengguna($data['id_pengguna'], $data);
        return redirect()->to('/dosen');
    }

    public function hapus()
    {
        $id = $_POST['id_pengguna'];

        $this->penggunaModel->deletePengguna($id);
        return redirect()->to('/dosen');
    }
}
