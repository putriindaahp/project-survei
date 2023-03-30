<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan', 'layanan_id', 'is_active'];

    public function Pilihanjawabans()
    {
        return $this->hasMany(Pilihanjawaban::class);
    }
    
    public function layanan()
    {
        return $this->belongsTo(layanan::class);
    }
}
