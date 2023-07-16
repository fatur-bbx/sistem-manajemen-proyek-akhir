<?php

namespace App\Controllers;

use App\Models\DokumenModel;

class Dokumen extends BaseController
{
    public $dokumenModel;
    public $session;

    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'judulHalaman' => 'Dokumen',
            'dokumen' => $this->dokumenModel,
            'session' => $this->session,
        ];
        return view('pages/dokumen', $data);
    }

    public function tambah()
    {
        $file = '';
        $nim = $_POST["nim"];
        if(isset($_FILES['pa'])){
            $file = $_FILES['pa'];
            $name = $file['name'];
            if(move_uploaded_file($file["tmp_name"], WRITEPATH."uploads/uploaded/$nim-$name")){
                $data = [
                    'nama_dokumen' => $nim.'-'.$name,
                    'jenis_dokumen' => $_POST['jenis_dokumen'],
                    'id_mahasiswa' => $_POST['id_mahasiswa']
                ];

                $this->dokumenModel->createDokumen($data);
            }
        }else if(isset($_FILES['ba'])){
            $file = $_FILES['ba'];
            $name = $file['name'];
            if(move_uploaded_file($file["tmp_name"], WRITEPATH."uploads/uploaded/$nim-$name")){
                $data = [
                    'nama_dokumen' => $nim.'-'.$name,
                    'jenis_dokumen' => $_POST['jenis_dokumen'],
                    'id_mahasiswa' => $_POST['id_mahasiswa']
                ];

                $this->dokumenModel->createDokumen($data);
            }
        } else if(isset($_FILES['lp'])){
            $file = $_FILES['lp'];
            $name = $file['name'];
            if(move_uploaded_file($file["tmp_name"], WRITEPATH."uploads/uploaded/$nim-$name")){
                $data = [
                    'nama_dokumen' => $nim.'-'.$name,
                    'jenis_dokumen' => $_POST['jenis_dokumen'],
                    'id_mahasiswa' => $_POST['id_mahasiswa']
                ];

                $this->dokumenModel->createDokumen($data);
            }
        } else if(isset($_FILES['fr'])){
            $file = $_FILES['fr'];
            $name = $file['name'];
            if(move_uploaded_file($file["tmp_name"], WRITEPATH."uploads/uploaded/$nim-$name")){
                $data = [
                    'nama_dokumen' => $nim.'-'.$name,
                    'jenis_dokumen' => $_POST['jenis_dokumen'],
                    'id_mahasiswa' => $_POST['id_mahasiswa']
                ];

                $this->dokumenModel->createDokumen($data);
            }
        }

        return redirect()->to('/dokumen');
    }

    public function hapus()
    {
        $f = $_POST["fileDokumen"];
        $id = $_POST["id_dokumen"];
        $this->dokumenModel->deleteDokumen($id);
		unlink(WRITEPATH."uploads/uploaded/$f");
		return redirect()->to('/dokumen');
    }

    public function viewFile($id)
    {
        $fileModel = $this->dokumenModel;
        $file = $fileModel->find($id);
        if ($file) {
            $filePath = WRITEPATH . 'uploads/uploaded/' . $file['nama_dokumen'];

            if (is_file($filePath)) {
                $mime = mime_content_type($filePath);
                header('Content-Type: ' . $mime);
                readfile($filePath);
                exit();
            }
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
    }
}
