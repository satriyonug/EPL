<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSertifikatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_peserta');
            $table->integer('nilai');
            $table->string('nomor_sertifikat');
            $table->timestamps();
        });
        
        Schema::table('sertifikat', function (Blueprint $table) {
            $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta')
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
        Schema::dropIfExists('sertifikat');
    }
}
