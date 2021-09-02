<?php

namespace App\Models;

use CodeIgniter\Model;

class TimelineModel extends Model
{
    protected $table = 'm_timeline';
    protected $allowedFields = ['id_data', 'tanggal', 'judul', 'rincian'];

    public function getTimeline($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}