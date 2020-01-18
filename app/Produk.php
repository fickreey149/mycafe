<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
    	'nama_produk', 'harga_produk', 'satuan_produk', 'kategori_produk', 'foto',
    ];

    public function jual()
    {
        return $this->hasMany('App\Jual', 'id_produk');
    }

    public function dapur()
    {
        return $this->hasMany('App\Dapur', 'id_produk');
    }

    public function butuhItems()
    {
        return $this->belongsToMany(Bahan::class)->withPivot('jumlah');
    }
}
