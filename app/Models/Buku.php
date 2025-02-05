<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    protected $fillable = [
        'slug',
        'sampul',
        'file',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori_id',
        'status'
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }
    public function favoriteby(){
        return $this->hasMany(Favorit::class);
    }
}
