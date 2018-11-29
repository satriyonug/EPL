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

        Schema::table('kursus', function (Blueprint $table) {
            $table->foreign('id_instruktur')
                ->references('id_instruktur')
                ->on('instruktur')
                ->onUpdate('cascade');
        });

        Schema::table('kursus', function (Blueprint $table) {
            $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta')
                ->onUpdate('cascade');
        });

        Schema::table('kursus', function (Blueprint $table) {
            $table->foreign('id_mobil')
                  ->references('id_mobil')
                  ->on('mobil')
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
