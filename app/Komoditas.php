<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Komoditas extends Model 
{
    protected $table = 'komoditas';
    protected $fillable = ['id_komoditas', 'id_jenis', 'nama_komoditas'];

}
