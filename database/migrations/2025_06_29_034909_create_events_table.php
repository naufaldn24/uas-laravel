<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Event
            $table->text('description')->nullable(); // Deskripsi Event (opsional)
            $table->date('event_date'); // Tanggal Event
            $table->time('event_time')->nullable(); // Waktu Event (opsional)
            $table->string('location')->nullable(); // Lokasi Event (opsional)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};