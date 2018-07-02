<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "pendaftaran_file_sertifikat";

    protected $primary_key = "id_sertifikat_prestasi";
}
