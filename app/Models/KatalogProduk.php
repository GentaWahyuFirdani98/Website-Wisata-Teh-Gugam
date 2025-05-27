<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'slug',
        'jenis_produk',
        'harga',
        'deskripsi',
        'foto',
        'user_id'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Format harga
    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produk) {
            $produk->slug = Str::slug($produk->nama_produk);
        });

        static::updating(function ($produk) {
            $produk->slug = Str::slug($produk->nama_produk);
        });
    }
}