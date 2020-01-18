<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Jual;
use App\Produk;
use App\User;
use Auth;
use DB;

class PemesananController extends Controller
{
    public function index(Request $request)
	{
		$user = Auth::user();
		$idu = $user->id;
		// $penjualan_list = DB::table('penjualans')->where('user_id', $idu)->get();
		$penjualan = Penjualan::all();
		$penjualan_list = $penjualan->where('user_id', $idu);

		
		return view('pemesanan.index', compact('penjualan_list'));
	}

	public function store(Request $request)
	{
		$penjualan_id = $request->penjualan_id;
		$produk_id = $request->produk_id;
		$penjualan_list = Jual::all();
		$penjualan = $penjualan_list->where('penjualan_id', $penjualan_id);
		$j = $penjualan->where('produk_id', $produk_id);

		foreach ($j as $ju) {
			$jual = Jual::findOrFail($ju->id);
			$jual->update([
				'id' => $jual->id,
				'status' => $jual->status+1,
				'jumlah' => $jual->jumlah,
				'produk_id' => $jual->produk_id,
				'penjualan_id' => $jual->penjualan_id,
			]);
			
		}

		
		return back();
	}

	public function edit(Request $request)
	{
		return back();
	}

	public function hapus(Request $request)
	{
		$penjualan_id = $request->penjualan_id;
		$produk_id = $request->produk_id;
		$jual = Jual::all();
		$batal = $jual->where('penjualan_id', $penjualan_id);
		$hapus = $batal->where('produk_id', $produk_id);
		foreach ($hapus as $j) {
			$data = array('id' => $j->id,
			 				'jumlah' => $j->jumlah,
			 				'status' => $j->status,
			 				'penjualan_id' => $j->penjualan_id,
			 				'produk_id' => $j->produk_id,
			 			);
			
			$ids=$j->id;
			$del = Jual::findOrFail($ids);
			$del->delete();
		};
		return back();
	}

	public function ganti(Request $request)
	{
		$penjualan_id = $request->penjualan_id;
		$produk_id = $request->produk_id;
		$penjualan_list = Jual::all();
		$penjualan = $penjualan_list->where('penjualan_id', $penjualan_id);
		$jual = $penjualan->where('produk_id', $produk_id);

		return view('pemesanan.edit', compact('jual'));
	}
}
