<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon_mahasiswa extends Model
{
    protected $table = "pendaftaran_pilihan_calon_mhs_smps1";
    protected $primary_key = "id_pilihan_calon_mhs";
    
    public function detail_mahasiswa(){
    	return $this->hasOne("App\Detail_mahasiswa", "id_calon_mhs", "id_calon_mhs");
    }

    function dosen_penilai(){
    	return $this->belongsTo("App\Dosen_penilai", "id_pilihan_calon_mhs", "id_pilihan_calon_mhs");
    }

    function programstudi(){
    	return $this->hasOne("App\Programstudi", "kode_pro", "kode_pro");
    }

    function nilai(){
        return $this->hasOne("App\Nilai", "id_pilihan_calon_mhs", "id_pilihan_calon_mhs");
    }

    function file(){
        return $this->hasMany("App\File", "id_calon_mhs", "id_calon_mhs");
    }
}
