<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('peserta', function (Blueprint $table) {
          $table->increments('id_peserta');
          $table->integer('id_instruktur')->unsigned()->nullable();
          $table->integer('id')->unsigned();
          $table->integer('id_jadwal')->unsigned()->nullable();
          $table->string('nama');
          $table->char('jenis_kelamin', 1);
          $table->date('tanggal_lahir');
          $table->string('alamat');
          $table->string('nomor_telepon', 20);
          $table->char('verifikasi', 1)->default('0');
          $table->integer('sisa_kursus')->unsigned();
      });

      Schema::table('pembayaran', function (Blueprint $table) {
          $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta')
                ->onUpdate('cascade');
      });

      Schema::table('kursus', function (Blueprint $table) {
          $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta')
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
