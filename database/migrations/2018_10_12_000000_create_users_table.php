<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');
          $table->string('email')->unique();
          $table->string('password');
          $table->char('role', 1)->default("P");
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::table('peserta', function (Blueprint $table) {
          $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
      });

      Schema::table('instruktur', function (Blueprint $table) {
          $table->foreign('id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('users');
    }
}
