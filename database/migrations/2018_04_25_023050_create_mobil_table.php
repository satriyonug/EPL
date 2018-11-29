<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mobil', function (Blueprint $table) {
          $table->increments('id_mobil');
          $table->string('nomor_polisi')->unique();
          $table->unsignedInteger('id_jadwal')->nullable();
          $table->string('jenis_merk');
          $table->string('tipe_mobil');
          $table->integer('cc');
          $table->string('nomor_rangka');
          $table->string('foto_mobil');
          $table->string('warna');
          $table->char('tahun', 4);

      });

      Schema::table('mobil', function (Blueprint $table) {
        $table->foreign('id_jadwal')
              ->references('id_jadwal')
              ->on('jadwal')
              ->onDelete('cascade')
              ->onUpdate('cascade');
    });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
