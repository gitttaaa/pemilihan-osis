<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sekbid extends Model
{
    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
