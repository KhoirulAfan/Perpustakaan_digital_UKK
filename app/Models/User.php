<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public function haspeminjaman($bukuid){
        // dd($bukuid);
        $userid = Auth::guard('web')->user()->id;
        // dd($userid);
        $data = Peminjaman::where('buku_id',$bukuid)->where('user_id',$userid)->where('status','pinjam')->exists();        
        return $data;
    }
    public function buku(){
        return $this->hasMany(Ulasan::class);
    }

    public function favorite(){
        return $this->hasMany(Favorit::class);
    }
    public function hasfavorit($buku){
        // return 'cek';        
        return $this->favorite()->where('buku_id',$buku)->exists();
    }
    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }
    public function hasulasan($bukuid){
        return $this->ulasan()->where('buku_id',$bukuid)->exists();
    }
}
