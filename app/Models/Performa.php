<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'user_id',
        'tanggal',
        'periode_awal',
        'periode_akhir',
        'umur_panen',
        'berat_panen',
        'jumlah_pakan',
        'ayam_mati',
        'ayam_afkir'
    ];
    
}
