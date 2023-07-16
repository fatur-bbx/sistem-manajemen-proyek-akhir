<?php

namespace App\Controllers;

use App\Models\DokumenModel;
use App\Models\MahasiswaModel;
use App\Models\PenggunaModel;

class Index extends BaseController
{

    public $penggunaModel;
    public $mahasiswaModel;
    public $dokumenModel;
    public $session;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dokumenModel = new DokumenModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if ($this->session->get('mahasiswa') || $this->session->get('exceptMahasiswa')) {
            return redirect()->to('/dashboard');
        } else {
            return view('pages/login');
        }
    }

    public function doLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->penggunaModel->getLogin($username, $password)) {
            $this->session->set('exceptMahasiswa', $this->penggunaModel->getLogin($username, $password));
            return redirect()->to('/dashboard');
        } else if ($this->mahasiswaModel->getLogin($username, $password)) {
            $this->session->set('mahasiswa', $this->mahasiswaModel->getLogin($username, $password));
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        if ($this->session->get('mahasiswa')) {
            $this->session->remove('mahasiswa');
            return redirect()->to('/');
        } else {
            $this->session->remove('exceptMahasiswa');
            return redirect()->to('/');
        }
    }

    public function dashboard()
    {
        if($this->session->get('mahasiswa') || $this->session->get('exceptMahasiswa')){
            $data = [
                'judulHalaman' => 'Dashboard',
                'session' => $this->session,
                'jumlahMahasiswa' => $this->mahasiswaModel->countMahasiswa(),
                'mahasiswaModel' => $this->mahasiswaModel,
            ];
            return view('pages/dashboard', $data);
        }else{
            return redirect()->to('/');
        }
    }

    public function mahasiswa()
    {
        $data = [
            'judulHalaman' => 'Mahasiswa',
            'dosen' => $this->penggunaModel->getAllPengguna(),
            'mahasiswa' => $this->mahasiswaModel->getAllMahasiswa(),
            'dokumen' => $this->dokumenModel,
            'dosenModel' => $this->penggunaModel,
            'session' => $this->session,
        ];
        return view('pages/mahasiswa', $data);
    }

    public function tambah()
    {
        $data = [
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'nim' => $_POST['nim'],
            'program_studi' => $_POST['program_studi'],
            'angkatan' => $_POST['angkatan'],
            'kbk' => $_POST['kbk'],
            'dosen_pembimbing' => $_POST['dosen_pembimbing'],
            'dosen_penguji' => $_POST['dosen_penguji'],
        ];

        $this->mahasiswaModel->createMahasiswa($data);
        return redirect()->to('/mahasiswa');
    }

    public function hapus()
    {
        $id = $_POST['id_mahasiswa'];

        for($i = 0; $i < 4; $i++) {
            $data = $this->dokumenModel->getFile($id, $i);
            if($data){
                $id_dokumen = $data[0]['id_dokumen'];
                $nama_dokumen = $data[0]['nama_dokumen'];
                unlink(WRITEPATH."uploads/uploaded/$nama_dokumen");
                $this->dokumenModel->deleteDokumen($id_dokumen);
            }else{
                continue;
            }
        }

        $this->mahasiswaModel->deleteMahasiswa($id);
        return redirect()->to('/mahasiswa');
    }
}
