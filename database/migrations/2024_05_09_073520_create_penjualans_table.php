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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->string('mitra', 50);
            $table->string('alamat', 50);
            $table->string('nama_pembeli', 50);
            $table->string('no_mobil', 10);
            $table->string('nama_driver', 50);
            $table->integer('jml_ayam_panen');
            $table->integer('berat_rr');
            $table->integer('harga_kg');
            $table->integer('total_harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
