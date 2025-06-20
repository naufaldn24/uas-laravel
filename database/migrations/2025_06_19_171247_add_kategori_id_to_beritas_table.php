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
    public function up()
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->after('tanggal');

            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }

};
