<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'username', 'password', 'nim', 'program_studi', 'angkatan', 'kbk', 'periode', 'dosen_pembimbing', 'dosen_penguji'];

    public function getMahasiswa($id)
    {
        return $this->find($id);
    }

    public function getAllMahasiswa()
    {
        return $this->findAll();
    }

    public function createMahasiswa($data)
    {
        return $this->insert($data);
    }

    public function updateMahasiswa($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMahasiswa($id)
    {
        return $this->delete($id);
    }

    public function countMahasiswa()
    {
        return $this->countAllResults();
    }

    public function countMahasiswayangDiampu($id_dosen)
    {
        return $this->where('dosen_pembimbing', $id_dosen)->orWhere('dosen_penguji', $id_dosen)->countAllResults();
    }

    public function getLogin($username, $password)
    {
        return $this->where('username', $username)->where('password', $password)->findAll();
    }
}
