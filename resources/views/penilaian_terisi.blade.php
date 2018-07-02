@extends("layout")
@push('style')
    <link href="{{ asset("css/style.css") }}" rel="stylesheet"/>
@endpush
@section("content")
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Seleksi Prestasi Jalur Mandiri</h2>
            <p class="category"></a>
                <!-- <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a> -->
            </p>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No. Pendaftaran</label>
                            <div class="col-sm-10">
                                <span>{{ unserialize(base64_decode($detail_calon_mahasiswa->no_pendaftaran)) }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <span>{{ $detail_calon_mahasiswa->detail_mahasiswa->nama_iden }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Pilihan 1</label>
                            <div class="col-sm-10">
                                <span>{{ $pilihan1->nama_jenjangy }} {{ $pilihan1->nama_prodiy }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Pilihan 2</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" id="" value="S1 BIMBINGAN DAN KONSELING"> -->
                                <span>
                                    @if(is_null($pilihan2))
                                    Tidak ada
                                    @else
                                    {{ $pilihan2->nama_jenjangy }} {{ $pilihan2->nama_prodiy }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <span>{{ $detail_calon_mahasiswa->detail_mahasiswa->sma->slta }}</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                        
                        
                    </div>
                </div>

                <div class="card">
                         <div class="card-header">
                            <h5 class="title">Sertifikat</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                            
                            @foreach($detail_calon_mahasiswa->file as $file)
                                <div class="col-sm-6">
                                    <a href="https://seleksi.um.ac.id/data/photo/{{ $file->nama_file }}" target="_blank"><img src="https://seleksi.um.ac.id/data/photo/{{ $file->nama_file }}" class="img-responsive img-thumbnail"></a>
                                    <figcaption class="figure-caption"><strong>Prestasi </strong>{{ $file->prestasi }}</figcaption>
                                </div>
                            @endforeach
                            </div>  
                        </div>
                    </div>

                <form action="{{ url('/ubah-penilaian') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <input type="hidden" name="nilai_id" value="{{ $nilai->id }}">
                        <div class="card-header">
                            <h5 class="title">Penilaian</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Bukti data sesuai dengan dokumen aslinya</label>
                                <div class="col-sm-4">
                                    <select name="dokumen_asli" id="" class="form-control">
                                        <option value="1" @if($nilai->nilai[0] == 1) selected="" @endif>Ya</option>
                                        <option value="0" @if($nilai->nilai[0] == 0) selected="" @endif>Tidak</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Uji Kompetensi Calon Mahasiswa</label>
                                <div class="col-sm-4">
                                    <select name="uji_kompetensi" id="" class="form-control">
                                        <option value="1" @if($nilai->nilai[1] == 1) selected="" @endif>1</option>
                                        <option value="2" @if($nilai->nilai[1] == 2) selected="" @endif>2</option>
                                        <option value="3" @if($nilai->nilai[1] == 3) selected="" @endif>3</option>
                                        <option value="5" @if($nilai->nilai[1] == 5) selected="" @endif>5</option>
                                        <option value="6" @if($nilai->nilai[1] == 6) selected="" @endif>6</option>
                                        <option value="7" @if($nilai->nilai[1] == 7) selected="" @endif>7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Motivasi Calon Mahasiswa Mendaftar ke Universitas Negeri Malang</label>
                                <div class="col-sm-4">   
                                    <select name="motivasi" id="" class="form-control">
                                       <option value="1" @if($nilai->nilai[2] == 1) selected="" @endif>1</option>
                                        <option value="2" @if($nilai->nilai[2] == 2) selected="" @endif>2</option>
                                        <option value="3" @if($nilai->nilai[2] == 3) selected="" @endif>3</option>
                                        <option value="5" @if($nilai->nilai[2] == 5) selected="" @endif>5</option>
                                        <option value="6" @if($nilai->nilai[2] == 6) selected="" @endif>6</option>
                                        <option value="7" @if($nilai->nilai[2] == 7) selected="" @endif>7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                         <div class="card-header">
                            <h5 class="title">Catatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="catatan" placeholder="Catatan" cols="20" rows="5">{{ $nilai->catatan }}</textarea>
                                    <small class="help-block">200 karakter</small>
                                </div>
                            </div>   
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="col-sm-12">
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-radio" type="radio" name="rekomendasi" required value="3" @if($nilai->rekomendasi == 3) checked  @endif>
                                            <span class="form-check-sign">Diterima (bebas UKT 2 Semester)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-radio" type="radio" name="rekomendasi" required value="2" @if($nilai->rekomendasi == 2) checked  @endif>
                                            <span class="form-check-sign">Diterima (membayar UKT)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-radio" type="radio" name="rekomendasi" required value="1" @if($nilai->rekomendasi == 1) checked  @endif>
                                            <span class="form-check-sign">Diterima (membayar UKT & SPSA)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-radio" type="radio" name="rekomendasi" required value="0" @if($nilai->rekomendasi == 0) checked  @endif>
                                            <span class="form-check-sign">Tidak Diterima</span>
                                        </label>
                                    </div>

                                </div>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
@endsection
