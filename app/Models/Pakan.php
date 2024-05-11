<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doc_id',
        'tanggal',
        'jenis_pakan',
        'jumlah_pakan',
        'hrg_pakan_satuan',
        'total_harga'
    ];
}
