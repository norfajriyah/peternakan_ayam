<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id', 
        'user_id', 
        'tanggal', 
        'umur',
        'mitra', 
        'alamat', 
        'nama_pembeli', 
        'no_mobil', 
        'nama_driver',
        'jml_ayam_panen', 
        'berat_rr', 
        'harga_kg', 
        'total_berat',
        'total_harga_jual'
    ];
}
