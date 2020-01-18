<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';

    protected $fillable = [
    	'kode_jual', 'tanggal_penjualan', 'no_meja', 'nama_konsumen', 'total_bayar', 'user_id'
    ];

    public function orderItems()
    {
    	return $this->belongsToMany(Produk::class)->withPivot('jumlah', 'status');
    }

    public function jual()
    {
    	return $this->hasMany('App\Jual', 'id_penjualan');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
