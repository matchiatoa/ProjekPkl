<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_product');  // Nama produk
            $table->string('barcode')->unique();  // Barcode unik
            $table->string('kategori');  // Kategori produk
            $table->decimal('harga', 18, 2)->change();// Harga produk dengan dua desimal
            $table->integer('stok');  // Jumlah stok
            $table->text('deskripsi')->nullable();  // Deskripsi produk, opsional
            $table->string('gambar')->nullable();  // Path gambar, opsional
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
