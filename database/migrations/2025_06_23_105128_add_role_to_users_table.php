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
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'role' setelah kolom 'email' (atau posisi lain yang Anda inginkan)
            // Default 'petugas' agar user yang sudah ada otomatis jadi petugas
            $table->string('role')->default('petugas')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Saat rollback, hapus kolom 'role'
            $table->dropColumn('role');
        });
    }
};