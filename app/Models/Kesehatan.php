<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id', 
        'user_id', 
        'tanggal', 
        'hari_ke', 
        'jns_obat_pagi', 
        'jns_obat_malam', 
        'jns_obat_hama', 
        'keterangan'
    ];
}
