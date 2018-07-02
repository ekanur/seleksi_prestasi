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

                <form action="{{ url('/penilaian') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <input type="hidden" name="id_pilihan_calon_mhs" value="{{ $detail_calon_mahasiswa->id_pilihan_calon_mhs }}">
                        <div class="card-header">
                            <h5 class="title">Penilaian</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Bukti data sesuai dengan dokumen aslinya</label>
                                <div class="col-sm-4">
                                    <select name="dokumen_asli" id="" class="form-control" required>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Uji Kompetensi Calon Mahasiswa</label>
                                <div class="col-sm-4">
                                    <select name="uji_kompetensi" id="" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-8 col-form-label">Motivasi Calon Mahasiswa Mendaftar ke Universitas Negeri Malang</label>
                                <div class="col-sm-4">   
                                    <select name="motivasi" id="" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
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
                                    <textarea class="form-control" name="catatan" placeholder="Catatan" cols="20" rows="5"></textarea>
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
                                            <input class="form-check-input" type="radio" required name="rekomendasi" value="3">
                                            <span class="form-check-sign">Diterima (bebas UKT 2 Semester)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" required name="rekomendasi" value="2">
                                            <span class="form-check-sign">Diterima (membayar UKT)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" required name="rekomendasi" value="1">
                                            <span class="form-check-sign">Diterima (membayar UKT & SPSA)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" required name="rekomendasi" value="0">
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
