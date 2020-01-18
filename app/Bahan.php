<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahans';

    protected $fillable = [
    	'nama_bahan', 'satuan_bahan', 'stok_bahan'
    ];

    public function beli()
    {
        return $this->hasMany('App\Beli', 'id_bahan');
    }

    public function penggunaan()
    {
        return $this->hasMany('App\Penggunaan', 'bahan_id');
    }
}
