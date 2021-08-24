<?php

namespace App\Models;

use CodeIgniter\Model;

class WeddingGiftModel extends Model
{
    protected $table = 'm_wedding_gift';
    protected $allowedFields = ['id_data','jenis', 'rincian'];

    public function getWeddingGift($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}