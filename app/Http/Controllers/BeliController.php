<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\Pembelian;
use Gloudemans\Shoppingcart\Facades\Cart;

class BeliController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();
        $jumlah_pembelian = Pembelian::count();
        $kode = $jumlah_pembelian+1;

        return view('cart.index', compact('cartItems', 'kode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk_list = Produk::all();
        $makanan_list = $produk_list->where('kategori_produk', 'Makanan');
        $minuman_list = $produk_list->where('kategori_produk', 'Minuman');
        $jumlah_produk = Produk::count();
        return view('cart.create', compact('makanan_list', 'minuman_list', 'produk_list', 'jumlah_produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$id = $request->id;
    	$bahan = Bahan::find($id);
        $cart = Cart::add($id, $bahan->nama_bahan, $request->jumlah, $request->harga_bahan);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $bahan = Bahan::find($id);
        Cart::add($id, $bahan->nama_bahan, $request->jumlah, $request->harga_bahan);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back();
    }
}
