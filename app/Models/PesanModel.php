<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'm_pesan';
    protected $allowedFields = ['id_data', 'judul', 'pesan'];

    public function getPesan($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}