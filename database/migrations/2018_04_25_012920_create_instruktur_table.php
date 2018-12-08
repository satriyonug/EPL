<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrukturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('instruktur', function (Blueprint $table) {
          $table->increments('id_instruktur');
          $table->integer('id')->unsigned();
          $table->string('nama');
          $table->char('jenis_kelamin', 1);
          $table->char('no_ktp', 16);
          $table->char('no_sim', 12);
          $table->string('foto_instruktur')->nullable();
          $table->string('nomor_telepon');
          $table->string('alamat');
          $table->char('verifikasi', 1);
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
