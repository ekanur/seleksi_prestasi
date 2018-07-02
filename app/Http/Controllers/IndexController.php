<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_mahasiswa;
use App\Nilai;

class IndexController extends Controller
{
    function index(){
    	$nip = 197806282003121004;
    	$calon_mahasiswa = Calon_mahasiswa::whereHas('dosen_penilai', function($query) use($nip){
    		$query->where('nip', $nip);
    	})->where([["status_diterima_pkk", "=", 1]])->orderBy("id_calon_mhs", "asc")->get();

    	// dd($calon_mahasiswa);

    	return view("dashboard", compact('calon_mahasiswa'));
    }

    
}
