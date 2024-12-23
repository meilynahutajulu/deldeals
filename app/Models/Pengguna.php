<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{

    use HasApiTokens, Notifiable;
    protected $table = 'pengguna';

    protected $fillable = [
        'username', 
        'full_name', 
        'email', 
        'nim', 
        'password',
        'telepon', // Tambahkan kolom telepon
        'alamat', // Tambahkan kolom alamat
        'created_at', 
        'updated_at'
    ];

    protected $hidden = ['password'];
}