<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeteksiDaunTeh extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'jenis_penyakit_id',
    'foto_daun',
    'confidence',
    'tanggal_upload',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function jenisPenyakit()
    {
        return $this->belongsTo(JenisPenyakit::class, 'jenis_penyakit_id');
    }

}
