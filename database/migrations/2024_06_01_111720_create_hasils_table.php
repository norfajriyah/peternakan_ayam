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
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('doc_id')->constrained('docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->float('bobot_rr');
            $table->float('fcr');
            $table->float('umur_panen');
            $table->float('deplesi');
            $table->float('performa');
            $table->enum('kategori', ['Sangat Baik', 'Baik', 'Kurang Baik']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasils');
    }
};
