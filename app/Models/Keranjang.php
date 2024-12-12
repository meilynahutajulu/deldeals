<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = ['user_id', 'item_id'];

    // Perbaiki relasi ke model Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
