<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Butuh extends Model
{
    protected $table = 'bahan_produk';

    protected $fillable = [
    	'jumlah', 'bahan_id', 'produk_id'
    ];
}
