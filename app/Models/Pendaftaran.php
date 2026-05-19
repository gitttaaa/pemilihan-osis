<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    protected $fillable = [
        'nama_lengkap',
        'nis',
        'kelas',
        'no_hp',
        'sekbid',
        'alasan',
        'status'
    ];
}
