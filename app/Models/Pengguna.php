<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
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
}
