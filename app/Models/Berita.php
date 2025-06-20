<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi', 'penulis', 'tanggal', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
