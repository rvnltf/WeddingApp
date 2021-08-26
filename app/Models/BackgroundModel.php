<?php

namespace App\Models;

use CodeIgniter\Model;

class BackgroundModel extends Model
{
    protected $table = 'm_background';
    protected $allowedFields = ['id_data','jenis', 'foto'];

    public function getBackground($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}