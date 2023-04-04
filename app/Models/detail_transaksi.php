<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $fillable = [
        'id_paket',
        'id_transaksi',
        'qty',
        'keterangan'
    ];
    use HasFactory;
    protected $table = 'detail_transaksi_15453';
}
