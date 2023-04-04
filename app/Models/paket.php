<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;
    protected $fillable = ['id_outlet','jenis','nama_paket','harga'];
    protected $table = 'paket_15453';

    public static function getnama($id){
        return paket::where('id',$id)->value('nama_paket');
    }
    public static function getharga($id){
        return paket::where('id',$id)->value('harga');
    }

}
