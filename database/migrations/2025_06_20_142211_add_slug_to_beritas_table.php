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
        Schema::table('beritas', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->string('slug')->unique()->after('judul');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beritas', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

};
