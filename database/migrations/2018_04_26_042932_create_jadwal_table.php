<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jadwal', function (Blueprint $table) {
          $table->increments('id_jadwal');
          $table->string('hari');
          $table->time('jam_mulai');
          $table->time('jam_selesai');

      });

      Schema::table('peserta', function (Blueprint $table) {
          $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwal')
                ->onUpdate('cascade');
      });

      Schema::table('instruktur_memilih', function (Blueprint $table) {
          $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwal')
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
