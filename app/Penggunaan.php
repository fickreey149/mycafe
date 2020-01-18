<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    protected $table = 'penggunaans';

    protected $fillable = [
    	'kode_guna', 'tgl_guna', 'jumlah', 'bahan_id'
    ];

    public function bahan()
    {
    	return $this->belongsTo('App\Bahan', 'bahan_id');
    }
}
