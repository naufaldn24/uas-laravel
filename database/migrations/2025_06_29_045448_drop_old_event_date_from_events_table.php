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
        Schema::table('events', function (Blueprint $table) {
            // Hapus kolom event_date jika ada
            if (Schema::hasColumn('events', 'event_date')) {
                $table->dropColumn('event_date');
            }
            // Hapus kolom event_time jika ada (jika sebelumnya juga ada)
            if (Schema::hasColumn('events', 'event_time')) {
                $table->dropColumn('event_time');
            }
            // Hapus kolom location jika ada (jika sebelumnya juga ada)
            if (Schema::hasColumn('events', 'location')) {
                $table->dropColumn('location');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Tambahkan kembali kolom-kolom jika rollback
            // Perlu diingat, ini tidak akan mengisi data lama jika kolomnya sudah dihapus
            $table->date('event_date')->nullable(); // atau not null jika itu aslinya
            $table->time('event_time')->nullable();
            $table->string('location')->nullable();
        });
    }
};