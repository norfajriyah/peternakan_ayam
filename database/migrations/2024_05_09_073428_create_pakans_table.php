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
        Schema::create('pakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('doc_id')->constrained('docs')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->enum('jenis_pakan', ['Galaxy 00', 'Galaxy 01', 'B 151 C / Strarfeed', '510', '511 Alfa']); // Adjust enum values as needed
            $table->integer('jumlah_pakan');
            $table->integer('hrg_pakan_satuan');
            $table->integer('total_harga');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakans');
    }
};
