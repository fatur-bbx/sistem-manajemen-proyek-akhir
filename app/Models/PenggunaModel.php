<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["nama","username", "password", "level"];

    public function getPengguna($id)
    {
        return $this->find($id);
    }

    public function getAllPengguna()
    {
        return $this->findAll();
    }

    public function createPengguna($data)
    {
        return $this->insert($data);
    }

    public function updatePengguna($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePengguna($id)
    {
        return $this->delete($id);
    }

    public function countPengguna()
    {
        return $this->countAllResults();
    }

    public function getLogin($username, $password)
    {
        return $this->where('username', $username)->where('password', $password)->findAll();
    }
}
