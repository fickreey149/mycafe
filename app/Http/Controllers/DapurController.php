<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Jual;
use App\Produk;

class DapurController extends Controller
{
    public function index(Request $request)
	{
		$jual_list = Jual::orderBy('id')->paginate(10);
		$jum = $jual_list->where('status','0');
		$jumlah_pesanan = $jum->count();
		$jumlah_penjualan = Jual::count();
		return view('dapur.index', compact('jual_list', 'jumlah_penjualan', 'jumlah_pesanan'));
	}

	public function update($id, Request $request)
	{
		$jual = Jual::findOrFail($id);
		$jual->status = $request->status;

		$jual->update($request->all());
		return back();
	}
}
