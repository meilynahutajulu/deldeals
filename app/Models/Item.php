<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    // Tentukan kolom yang dapat diisi
    protected $fillable = ['name', 'price', 'description', 'image', 'user_id', 'contact'];
}
