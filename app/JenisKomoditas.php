<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JenisKomoditas extends Model 
{
    protected $table = 'jenis_komoditas';
    protected $fillable = ['id_jenis', 'nama_jenis'];

}
