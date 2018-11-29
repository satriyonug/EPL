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
          $table->unsignedInteger('id_instruktur')->nullable();
          $table->string('hari');
          $table->time('jam_mulai');
          $table->time('jam_selesai');

      });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('id_instruktur')
                ->references('id_instruktur')
                ->on('instruktur')
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
