<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_dokumen', 'jenis_dokumen', 'id_mahasiswa'];

    public function getDokumen($id)
    {
        return $this->find($id);
    }

    public function getAllDokumen()
    {
        return $this->findAll();
    }

    public function createDokumen($data)
    {
        return $this->insert($data);
    }

    public function updateDokumen($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteDokumen($id)
    {
        return $this->delete($id);
    }

    public function countDokumen()
    {
        return $this->countAllResults();
    }

    public function getFile($id, $dokumen)
    {
        return $this->select('id_dokumen, nama_dokumen')->where('id_mahasiswa', $id)->where('jenis_dokumen', $dokumen)->findAll();
    }

    public function getForMhs($id)
    {
        return $this->where('id_mahasiswa', $id)->orderBy('jenis_dokumen', 'ASC')->findAll();
    }
}
