<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_mahasiswa;
use App\Nilai;

class IndexController extends Controller
{
    function index(){
    	$nip = session('userID');
    	$calon_mahasiswa = Calon_mahasiswa::whereHas('dosen_penilai', function($query) use($nip){
    		$query->where('nip', 'like',  '%'.$nip.'%');
    	})->where([["status_diterima_pkk", "=", 1]])->orderBy("id_calon_mhs", "asc")->get();

    	$nilai = Nilai::where("nip", $nip)->count();
    	// dd($nilai);

    	return view("dashboard", compact('calon_mahasiswa', 'nilai'));
    }

    
}
