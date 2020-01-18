<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Produk;
use App\Jual;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use Session;
use DB;

class PenjualanController extends Controller
{
    public function index()
	{
		$penjualan_list = Penjualan::orderBy('id')->paginate(10);
		$jumlah_penjualan = Penjualan::count();
		return view('penjualan.index', compact('penjualan_list', 'jumlah_penjualan'));
	}

	public function show($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		return view('penjualan.show', compact('penjualan'));
	}

	public function create()
	{
		// $produk_list = Produk::all();
		// $makanan_list = $produk_list->where('kategori_produk', 'Makanan');
		// $minuman_list = $produk_list->where('kategori_produk', 'Minuman');
		// $jumlah_produk = Produk::count();
		return view('cart.create');
	}

	public function store(Request $request)
	{
		$input = $request->all();
		$user = Auth::user();

		$validator = Validator::make($input, [
			'nama_konsumen' => 'required|string|max:20',
			'no_meja' => 'required|string|max:2',
			'tanggal_penjualan' => 'required|date',
			'kode_jual' => 'required|string',
		]);
		if ($validator->fails()) {
			return redirect('cart')
				->withInput()
				->withErrors($validator);
		}

		$penjualan =  Penjualan::create([
			'kode_jual' => $request->kode_jual,
			'tanggal_penjualan' => $request->tanggal_penjualan,
			'no_meja' => $request->no_meja,
			'total_bayar' => Cart::total(),
			'nama_konsumen' => $request->nama_konsumen,
			'user_id' => $user->id
		]);
		

		$cartItems = Cart::content();
		foreach ($cartItems as $cartItem) {
			$penjualan->orderItems()->attach($cartItem->id, [
				'jumlah' => $cartItem->qty,
				'status' => 0
			]);
		}

		Cart::destroy();

		Session::flash('flash_message', 'Pemesanan Berhasil...');

		return redirect('cart/create');
	}

	public function edit($id)
	{
		$penjualan = Pembelian::findOrFail($id);
		return view('pembelian.edit', compact('pembelian'));
	}

	public function update($id, Request $request)
	{
		$pembelian = Pembelian::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
			'tanggal_beli' => 'required|date',
			'jumlah_beli' => 'required|string',
			'total_bayar' => 'required|string'
		]);
		if ($validator->fails()) {
			return redirect('pembelian/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$pembelian->update($request->all());
		return redirect('pembelian');
	}

	public function destroy($id)
	{
		$jual = DB::table('penjualan_produk')->where('penjualan_id', $id)->get();
		foreach ($jual as $j) {
			$data = array('id' => $j->id,
			 				'jumlah' => $j->jumlah,
			 				'status' => $j->status,
			 				'produk_id' => $j->produk_id,
			 				'penjualan_id' => $j->penjualan_id,
			 			);
			
			$ids=$j->id;
			$jual = Jual::findOrFail($ids);
			$jual->delete();
		};

		
		$penjualan = Penjualan::findOrFail($id);
		$penjualan->delete();
		return redirect('penjualan');
	}

	public function print($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		return view('penjualan.print', compact('penjualan'));
	}

}
