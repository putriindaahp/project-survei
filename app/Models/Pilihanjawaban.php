<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilihanjawaban extends Model
{
    use HasFactory;
    protected $fillable = ['pilihan_jawaban', 'poin', 'pertanyaan_id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
