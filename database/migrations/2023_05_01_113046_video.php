<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Video extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('id_mapel');
            $table->string('video');
            $table->string('gambar');
            $table->integer('id_kategori');
            $table->string('deskripsi');
            $table->integer('hapus')->default(0);
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("video");
    }
}
