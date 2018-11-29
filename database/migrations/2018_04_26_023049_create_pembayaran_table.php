<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pembayaran', function (Blueprint $table) {
          $table->increments('id_pembayaran');
          $table->integer('id_peserta')->unsigned();
          $table->integer('jumlah_kursus')->unsigned();
          $table->timestamps();
          $table->string('nomor_rekening')->nullable();
          $table->char('verifikasi', 1)->nullable();

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
