<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_mahasiswa;
use App\Dosen_penilai;
use App\Programstudi;
use App\Nilai;

class PenilaianController extends Controller
{
    function detail($id_calon_mhs){
    	$nip = session('userID');
    	$detail_calon_mahasiswa = Calon_mahasiswa::with(["dosen_penilai"=>function($query) use ($nip){
    		$query->where("nip", $nip);
    	}, "file"=>function($query){
            $query->where([["soft_delete", '=', '0'], ["jenis", '=', '8']]);
        }])->where("id_calon_mhs", $id_calon_mhs)->first();

        
    	$pilihan1 = Programstudi::where("kode_pro", $detail_calon_mahasiswa->pilihan1)->first();
    	$pilihan2 = Programstudi::where("kode_pro", $detail_calon_mahasiswa->pilihan2)->first();
    	
    	$nilai = Nilai::where([['id_pilihan_calon_mhs','=', $detail_calon_mahasiswa->id_pilihan_calon_mhs], ['nip', '=', $nip]])->first();
    	if(!is_null($nilai)){
            // dd($nilai->rekomendasi);
            $nilai->nilai = json_decode($nilai->nilai);
    		return view("penilaian_terisi", compact('detail_calon_mahasiswa', 'pilihan1', 'pilihan2', 'nilai'));
    	}
    	
    	

    	return view("penilaian", compact('detail_calon_mahasiswa', 'pilihan1', 'pilihan2'));
    }

    function save(Request $request){
        $nip = session('userID');
        $nilai = json_encode(array($request->dokumen_asli, $request->uji_kompetensi,  $request->motivasi));

        $penilaian = new Nilai;
        $penilaian->id_pilihan_calon_mhs = $request->id_pilihan_calon_mhs;
        $penilaian->nilai = $nilai;
        $penilaian->rekomendasi = $request->rekomendasi;
        $penilaian->nip = $nip;
        $penilaian->catatan = $request->catatan;

        $penilaian->save();

        return redirect()->back();
    }

    function update(Request $request){
         // $nip = '197806282003121004';
         $nilai = json_encode(array($request->dokumen_asli, $request->uji_kompetensi,  $request->motivasi));
         $penilaian = Nilai::find($request->nilai_id);
         $penilaian->nilai = $nilai;
         $penilaian->rekomendasi = $request->rekomendasi;
         $penilaian->catatan = $request->catatan;
         $penilaian->save();

         return redirect()->back();
    }
}
