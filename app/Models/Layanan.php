<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['layanan'];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function jawaban_respondens()
    {
        return $this->hasMany(Jawabanresponden::class);
    }
}
