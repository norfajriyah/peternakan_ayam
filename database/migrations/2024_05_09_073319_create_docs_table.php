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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('periode')->index();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('distributor', 50);
            $table->enum('jns_ayam', ['CP', 'MB', 'Wonokoyo']); // Adjust enum values as needed
            $table->integer('jumlah_ayam');
            $table->string('harga_kontrak', 50);
            $table->string('total_harga', 50);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docs');
    }
};
