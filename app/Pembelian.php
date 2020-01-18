<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';

    protected $fillable = [
    	'kode_beli', 'tanggal_pembelian', 'total_bayar', 'supplier_id'
    ];

    public function buyItems()
    {
        return $this->belongsToMany(Bahan::class)->withPivot('jumlah', 'harga_bahan');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function beli()
    {
    	return $this->hasMany('App\Beli', 'id_pembelian');
    }

}
