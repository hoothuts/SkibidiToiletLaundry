<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('cust_id');
            $table->string('nama');
            $table->enum('jenis', ['Setrika','Cuci Setrika','Cuci']);
            $table->enum('layanan', ['Express','Regular']);
            $table->enum('progress', ['Belum diproses','Dalam proses','Selesai']);
            $table->date('tanggal_masuk');
            $table->integer('berat');
            $table->double('biaya');
            $table->enum('status_pembayaran', ['Lunas','Belum Lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
