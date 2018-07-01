@extends("layout")
@push('style')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section("content")
<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Peserta Seleksi Prestasi Jalur Mandiri</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                            <th>
                                                    Nama
                                                </th>
                                                <th>
                                                    Sekolah Asal
                                                </th width="60%">
                                                <th>
                                                    Nilai
                                                </th>
                                                <th class="text-right">
                                                    Penilaian
                                                </th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach($calon_mahasiswa as $calon_mahasiswa)
                                    <tr>
                                        <td>
                                            {{$calon_mahasiswa->nama}}
                                        </td>
                                        <td>
                                            {{$calon_mahasiswa->asal_sekolah}}
                                        </td>
                                        <td>
                                            {{$calon_mahasiswa->nilaiss}}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url("/penilaian/".$calon_mahasiswa->id) }}"><i class="now-ui-icons files_single-copy-04"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection

@push('script')
<script type="text/javascript" src="{{ url('/js/plugins/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $(".table").DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }

    });
    });
</script>
@endpush