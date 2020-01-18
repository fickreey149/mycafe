<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produk;
use App\Bahan;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Validator;

class ProdukController extends Controller

{
	public function daftar()
	{
		$produk_list = Produk::all();
		$makanan_list = $produk_list->where('kategori_produk', 'Makanan');
		$minuman_list = $produk_list->where('kategori_produk', 'Minuman');
		$jumlah_produk = Produk::count();
		return view('produk.daftar', compact('makanan_list', 'minuman_list', 'jumlah_produk'));
	}

	public function index()
	{
		$produk_list = Produk::orderBy('nama_produk', 'asc')->paginate(10);
		$jumlah_produk = Produk::count();
		return view('produk.index', compact('produk_list', 'jumlah_produk'));
	}

	public function show($id)
	{
		$produk = Produk::findOrFail($id);
		return view('produk.show', compact('produk'));
	}

	public function create()
	{
		$list_bahan = Bahan::all();
		$cartItems = Cart::content();
		return view('produk.create', compact('list_bahan', 'cartItems'));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		if ($request->hasFile('foto')) {
			$foto = $request->file('foto');
			$ext = $foto->getClientOriginalExtension();

			if ($request->file('foto')) {
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path = 'fotoupload';
				$request->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:20',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'foto' => 'sometimes|max:5000',
		]);
		if ($validator->fails()) {
			return redirect('produk/create')
				->withInput()
				->withErrors($validator);
		}
		$produk = Produk::create($input);

		$cartItems = Cart::content();
		foreach ($cartItems as $cartItem) {
			$produk->butuhItems()->attach($cartItem->id, [
				'jumlah' => $cartItem->qty
			]);
		}

		Cart::destroy();
		return redirect('produk');
	}

	public function edit($id)
	{
		$produk = Produk::findOrFail($id);
		return view('produk.edit', compact('produk'));
	}

	public function update($id, Request $request)
	{
		$produk = Produk::findOrFail($id);
		$input = $request->all();

		if ($request->hasFile('foto')) {

			$exist = Storage::disk('foto')->exist($produk->foto);
			if (isset($produk->foto) && $exist) {
				$delete = Storage::disk('foto')->delete($produk->foto);
			}

		$foto = $request->file('foto');
		$ext = $foto->getClientOriginalExtension();
		if ($request->file('foto')) {
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path = 'fotoupload';
				$request->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:20',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'foto' => 'sometimes|max:5000',
		]);
		if ($validator->fails()) {
			return redirect('produk/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$produk->update($request->all());
		return redirect('produk');
	}

	public function destroy($id)
	{
		$produk = Produk::findOrFail($id);
		$produk->delete();
		return redirect('produk');
	}	
}