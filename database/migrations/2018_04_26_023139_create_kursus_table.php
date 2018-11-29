<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kursus', function (Blueprint $table) {
          $table->increments('id_kursus');
          $table->integer('id_instruktur')->unsigned();
          $table->integer('id_peserta')->unsigned();
          $table->integer('id_mobil')->unsigned();
          $table->integer('kursus_ke')->unsigned();
          $table->text('evaluasi')->nullable();
          $table->char('sudah_isi', 1)->default("0");

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
