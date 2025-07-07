<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date', // Tambahkan
        'end_date',   // Tambahkan
        'photo',      // Tambahkan
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date', // Cast juga end_date jika ada
    ];
    
}