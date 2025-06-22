<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'slug', 'isi', 'penulis', 'tanggal', 'kategori_id', 'image'];

    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
