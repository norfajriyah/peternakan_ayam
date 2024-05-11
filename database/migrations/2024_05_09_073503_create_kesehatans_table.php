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
        Schema::create('kesehatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id')->constrained('docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->integer('hari_ke');
            $table->enum('jns_obat_pagi', ['Gula Merah', 'Amoxitin', 'Cyprotylogrin', 'Vitakur', 'Enoquyl']); // Adjust enum values as needed
            $table->enum('jns_obat_malam', ['Maxtrime', 'Amilyte']); // Adjust enum values as needed
            $table->enum('jns_obat_hama', ['Delaxtrin', 'Neoantisep']); // Adjust enum values as needed
            $table->string('keterangan', 50)->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatans');
    }
};
