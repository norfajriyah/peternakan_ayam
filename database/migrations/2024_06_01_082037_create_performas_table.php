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
        Schema::create('performas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('doc_id')->constrained('docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlahayam_awal');
            $table->integer('jumlahayam_akhir');
            $table->integer('umur_panen');
            $table->integer('berat_panen');
            $table->integer('jumlah_pakan');
            $table->integer('ayam_mati');
            $table->integer('ayam_afkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performas');
    }
};
