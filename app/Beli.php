<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = 'bahan_pembelian';

    protected $fillable = [
    	'harga_bahan', 'jumlah', 'bahan_id', 'pembelian_id'
    ];

    protected $guarded = ['id', '_token'];

    public function bahan()
    {
    	return $this->belongsTo('App\Bahan', 'bahan_id');
    }

    public function pembelian()
    {
    	return $this->belongsTo('App\Pembelian', 'pembelian_id');
    }
    
    public function getBahanrAttribute()
    {
        return $this->bahan->lists('id')->toArray();
    }

    public function scopeBahan($query, $id_bahan)
    {
        return $query->where('bahan_id', $bahan_id);
    }

}
