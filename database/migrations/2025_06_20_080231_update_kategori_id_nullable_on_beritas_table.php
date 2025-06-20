<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('beritas', function (Blueprint $table) {
            // Drop foreign key lama dulu
            $table->dropForeign(['kategori_id']);

            // Ubah kolom kategori_id menjadi nullable
            $table->unsignedBigInteger('kategori_id')->nullable()->change();

            // Tambahkan kembali foreign key dengan nullOnDelete
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('beritas', function (Blueprint $table) {
            // Drop foreign key nullOnDelete
            $table->dropForeign(['kategori_id']);

            // Ubah kembali kolom menjadi tidak nullable
            $table->unsignedBigInteger('kategori_id')->nullable(false)->change();

            // Tambahkan foreign key cascade seperti sebelumnya
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onDelete('cascade');
        });
    }
};
