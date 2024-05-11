<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal',
        'distributor',
        'jns_ayam',
        'jumlah_ayam',
        'harga_kontrak',
        'total_harga',
    ];
}
