<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Penggunaan;
use App\Bahan;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use Session;
use DB;

class PenggunaanController extends Controller
{
    public function index()
	{
		$penggunaan_list = Penggunaan::orderBy('id')->paginate(10);
		$jumlah_penggunaan = Penggunaan::count();
		return view('penggunaan.index', compact('penggunaan_list', 'jumlah_penggunaan'));
	}

	public function show($id)
	{
		//
	}

	public function create()
	{
		$list_bahan = Bahan::pluck('nama_bahan', 'id');
		
		$jum = Penggunaan::count();
		$kode = $jum + 1;
		return view('penggunaan.create', compact('list_bahan', 'cartItems', 'kode'));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		

		$penggunaan =  Penggunaan::create([
			'kode_guna' => $request->kode_guna,
			'tgl_guna' => $request->tgl_guna,
			'bahan_id' => $request->bahan_id,
			'jumlah' => $request->jumlah,
		]);

		$b = $request->bahan_id;
		$bahan = Bahan::find($b);
		$bahan->update([
				'id' => $bahan->id,
				'nama_bahan' => $bahan->nama_bahan,
				'satuan_bahan' => $bahan->satuan_bahan,
				'stok_bahan' => $bahan->stok_bahan - $request->jumlah,
			]);
		

		

		return redirect('penggunaan');
	}

	public function edit($id)
	{
		$penggunaan = Penggunaan::findOrFail($id);
		$list_bahan = Bahan::pluck('nama_bahan', 'id');

		return view('penggunaan.edit', compact('penggunaan', 'list_bahan'));
	}

	public function update($id, Request $request)
	{
		$penggunaan = Penggunaan::findOrFail($id);
		$input = $request->all();

		

		$penggunaan->update($request->all());
		return redirect('penggunaan');
	}

	public function destroy($id)
	{
		$penggunaan = Penggunaan::findOrFail($id);

		$penggunaan->delete();
		return redirect('penggunaan');
	}
}
