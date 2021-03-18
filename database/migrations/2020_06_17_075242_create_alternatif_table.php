<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('id_pemain')->unsigned();
            $table->bigInteger('id_kriteria')->unsigned();
            $table->bigInteger('nilai');
        });
        Schema::table('alternatif', function(Blueprint $table){
            $table->foreign('id_pemain')->references('id')->on('pemain')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alternatif',function(Blueprint $table){
            $table->dropForeign(['id_pemain','id_kriteria']);
            $table->dropColumn('id_pemain');
            $table->dropColumn('id_kriteria');
        });
        Schema::dropIfExists('alternatif');
    }
}
