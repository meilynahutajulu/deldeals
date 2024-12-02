<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'username', 
        'full_name', 
        'email', 
        'nim', 
        'password', 
        'created_at', 
        'updated_at'
    ];

    protected $hidden = ['password'];
}