<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'user_id',
        'tanggal',
        'bobot_rr',
        'fcr',
        'umur_panen',
        'deplesi',
        'performa',
        'kategori'
    ];
}
