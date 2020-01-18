<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBahanPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('harga_bahan');
            $table->string('jumlah');
            $table->integer('bahan_id')->unsigned();
            $table->integer('pembelian_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_pembelian');
    }
}
