<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_mahasiswa extends Model
{
    protected $table = "pendaftaran_calon_mhs";

    protected $primary_key = "id_calon_mhs";

    function sma(){
    	return $this->hasOne("App\Detail_SMA", "kode_slta", "kode_slta");
    }

    function file(){
    	return $this->hasMany("App\File", "id_calon_mhs", "id_calon_mhs");
    }
}
