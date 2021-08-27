<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangtuaModel extends Model
{
    protected $table = 'm_orangtua';
    protected $allowedFields = ['id_data','orangtua_pria', 'orangtua_wanita','anak_pria', 'anak_wanita'];

    public function getOrangtua($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}