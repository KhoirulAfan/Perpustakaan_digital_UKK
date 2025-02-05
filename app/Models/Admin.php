<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $guards = 'admins';
    protected $fillable = [
        'nama',
        'username',
        'password',        
    ];    
    protected $hidden = [
        'password',        
    ];
    protected function casts(): array
    {
        return [            
            'password' => 'hashed',
        ];
    }
}
