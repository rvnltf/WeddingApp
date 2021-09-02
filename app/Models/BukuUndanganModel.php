<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuUndanganModel extends Model
{
    protected $table = 'm_buku_undangan';
    protected $allowedFields = ['id_data', 'nama', 'no_wa', 'user_ig', 'user_fb', 'pesan'];

    public function getBukuUndangan($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
    public function getPesan($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['pesan' => $id])->first();
    }
}