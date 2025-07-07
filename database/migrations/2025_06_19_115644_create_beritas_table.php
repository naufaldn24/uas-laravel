<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('penulis')->nullable();
            $table->date('tanggal');
            $table->timestamps();
            Schema::create('berita', function (Blueprint $table) {
                // ...
                $table->foreignId('user_id')->constrained('users'); // Ini defaultnya NO ACTION/RESTRICT
                // ATAU ubah menjadi:
                // $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Jika user dihapus, beritanya ikut terhapus
                // ATAU
                // $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Jika user dihapus, user_id di berita jadi NULL
            });
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};
