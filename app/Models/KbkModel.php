<?php

namespace App\Models;

use CodeIgniter\Model;

class KbkModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kbk';
    protected $primaryKey       = 'id_kbk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_kbk'];

    public function getKbk($id)
    {
        return $this->find($id);
    }

    public function getAllKbk()
    {
        return $this->findAll();
    }

    public function createKbk($data)
    {
        return $this->insert($data);
    }

    public function updateKbk($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKbk($id)
    {
        return $this->delete($id);
    }

    public function countKbk()
    {
        return $this->countAllResults();
    }
}
