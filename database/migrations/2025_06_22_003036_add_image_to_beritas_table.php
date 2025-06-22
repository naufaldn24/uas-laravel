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
        Schema::table('beritas', function (Blueprint $table) {
            // Tambahkan kolom 'image' setelah kolom 'kategori_id' (sesuaikan posisinya)
            $table->string('image')->nullable()->after('kategori_id');
            // Atau $table->string('image')->nullable(); jika posisi tidak terlalu penting
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};