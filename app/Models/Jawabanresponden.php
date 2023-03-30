<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawabanresponden extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id', 'total_points', 'layanan_id'];

    public function pilihanjawaban()
    {
        return $this->belongsTo(Pilihanjawaban::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(layanan::class);
    }
}