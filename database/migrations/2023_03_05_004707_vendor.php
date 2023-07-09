<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_vendor');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('foto');
            $table->string('paket');
            $table->integer('id_kategori');
            $table->integer('hapus')->default(0);
            $table->string('created_at');
            $table->string('updated_at');
            $table->string("username");
            $table->string("password");
            $table->integer("like");
            $table->string("harga");
            $table->integer("jenis_vendor")->default(1);
            $table->string("facebook");
            $table->string("instagram");
            $table->string("asal");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
}

