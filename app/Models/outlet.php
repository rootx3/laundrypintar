<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;
    protected $fillable = ['nama','tlp','alamat'];
    protected $table = 'outlet_15453';

    // public static function getid($id){
    //     return outlet::where('id',$id)->value('id');
    // }
    public static function getnama($id){
        return outlet::where('id',$id)->value('nama');
    }
}
