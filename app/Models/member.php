<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $fillable = ['nama','tlp','alamat','jenis_kelamin'];
    protected $table = 'member_15453';

    public static function getnama($id){
       return member::where('id',$id)->value('nama'); 
    }
}
