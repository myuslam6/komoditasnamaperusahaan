<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model 
{
    protected $table = 'produk';
    protected $fillable = ['id_produk', 'id_jenis', 'id_komoditas', 'nama_produk'];

}