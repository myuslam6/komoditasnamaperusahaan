<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Perusahaan extends Model 
{
    protected $table = 'perusahaan';
    protected $fillable = ['id_perusahaan', 'nama_perusahaan'];

}