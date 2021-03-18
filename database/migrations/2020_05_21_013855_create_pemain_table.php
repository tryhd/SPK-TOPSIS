<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemain', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('posisi');
            $table->string('nama_tim');
            $table->string('foto');
            $table->string('tinggi');
            $table->string('negara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemain');
    }
}
