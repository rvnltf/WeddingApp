<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUndanganModel extends Model
{
    protected $table = 'm_data_undangan';
    protected $primaryKey = 'id_data';  
    protected $useTimestamps = true;
    protected $allowedFields = ['nick_pria','nick_wanita','fullname_pria','fullname_wanita','tanggal_akad','tanggal_resepsi','akad_awal','akad_akhir','resepsi_awal','resepsi_akhir','alamat_akad','link_akad','alamat_resepsi','link_resepsi','foto_pria','foto_wanita','musik','kalimat','is_actived'];
}