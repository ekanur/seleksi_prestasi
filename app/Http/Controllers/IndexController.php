<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_mahasiswa;

class IndexController extends Controller
{
    function index(){
    	$dosen_id = 1;
    	$calon_mahasiswa = Calon_mahasiswa::where("dosen_id", "=", $dosen_id)->get();

    	return view("dashboard", compact('calon_mahasiswa'));
    }
}
