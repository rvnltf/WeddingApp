<?php

namespace App\Models;

use CodeIgniter\Model;

class UcapanModel extends Model
{
    protected $table = 'm_ucapan';
    protected $primaryKey = 'id_ucapan';  
	protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'ucapan'];
}