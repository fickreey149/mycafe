<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    protected $table = 'penjualan_produk';

    protected $fillable = [
    	'jumlah', 'produk_id', 'penjualan_id', 'status'
    ];

    public function produk()
    {
    	return $this->belongsTo('App\Produk', 'produk_id');
    }

    public function penjualan()
    {
    	return $this->belongsTo('App\Penjualan', 'penjualan_id');
    }
}
