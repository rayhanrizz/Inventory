<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->bigIncrements('id_jurusan');
            $table->string('nama_jurusan', 50);
            $table->bigInteger('jurusan_fakultas')->unsigned();
            $table->timestamps();
        });
        Schema::table('jurusan', function($table) {
            $table->foreign('jurusan_fakultas')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
