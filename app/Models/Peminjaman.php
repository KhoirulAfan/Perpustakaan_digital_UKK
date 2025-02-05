<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['tanggal_pinjam','tanggal_kembali','status','user_id','buku_id'];

    public function buku(){
        return $this->belongsTo(Buku::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
