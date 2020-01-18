<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produk;
use App\Bahan;
use App\Butuh;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Validator;

class ResepController extends Controller
{
    public function index()
	{
		$produk_list = Produk::orderBy('nama_produk', 'asc')->paginate(10);
		$jumlah_produk = Produk::count();
		return view('resep.index', compact('produk_list', 'jumlah_produk'));
	}

	public function resep($id)
	{
		$list_bahan = Bahan::all();
		$cartItems = Cart::content();
		$produk = Produk::findOrFail($id);
		return view('resep.create', compact('list_bahan', 'cartItems', 'produk'));
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
		$produk_id = $request->id;
		$produk= Produk::find($produk_id);
		$idp = $produk->id;
		$cartItems = Cart::content();
		foreach ($cartItems as $cartItem) {
			$data = array('produk_id' => $idp,
				'jumlah' => $cartItem->qty,
				'bahan_id' => $cartItem->id);	
		Butuh::create($data);
		}

		Cart::destroy();
		return redirect('resep');
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

	public function hapus(Request $request)
	{
		$bahan_id = $request->bahan_id;
		$produk_id = $request->produk_id;
		$butuh = Butuh::all();
		$resep = $butuh->where('produk_id', $produk_id);
		$hapus = $resep->where('bahan_id', $bahan_id);
		foreach ($hapus as $j) {
			$data = array('id' => $j->id,
			 				'jumlah' => $j->jumlah,
			 				'bahan_id' => $j->bahan_id,
			 				'produk_id' => $j->pembelian_id,
			 			);
			
			$ids=$j->id;
			$del = Butuh::findOrFail($ids);
			$del->delete();
		};
		return redirect('resep');
	}

	public function destroy($id)
	{
		$produk = Produk::findOrFail($id);
		$produk->delete();
		return redirect('produk');
	}
}
