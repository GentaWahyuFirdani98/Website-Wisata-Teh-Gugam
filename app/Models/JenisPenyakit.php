<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenyakit extends Model
{
    use HasFactory;

    protected $table = 'jenis_penyakits';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_penyakit',
        'deskripsi',
    ];
}
