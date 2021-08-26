<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUndanganModel extends Model
{
    protected $table = 'm_data_undangan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nick_pria','nick_wanita','fullname_pria','fullname_wanita','tanggal_akad','tanggal_resepsi','akad_awal','akad_akhir','resepsi_awal','resepsi_akhir','alamat_akad','link_akad','alamat_resepsi','link_resepsi','foto_pria','foto_wanita','musik','kalimat','is_actived'];

    
    public function getdataUndangan($id = null)
    {
        if(empty($id)){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
    public function getDataAktif()
    {
        return $this->where(['is_actived' => 1])->first();
    }
}