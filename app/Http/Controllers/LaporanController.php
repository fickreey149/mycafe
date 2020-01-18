<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Pembelian;
use App\Jual;
use App\Dapur;
use App\Bahan;
use App\Beli;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use Session;
use DB;

class LaporanController extends Controller
{
    public function penjualan(Request $request)
	{
		$penjualan = Jual::all();
		$jumlah_penjualan = Jual::count();
		$jual_list = Penjualan::all();
		

		$jumlah_masuk = DB::table('penjualans')->sum('total_bayar');

		return view('laporan.penjualan.penjualan', compact('jual_list', 'jumlah_penjualan', 'jumlah_masuk'));
	}

	public function printpenjualan()
	{
		$penjualan = Jual::all();
		$jumlah_penjualan = Jual::count();
		$jual_list = Penjualan::all();
		

		$jumlah_masuk = DB::table('penjualans')->sum('total_bayar');

		return view('laporan.penjualan.print', compact('jual_list', 'jumlah_penjualan', 'jumlah_masuk'));
	}

	public function pembelian()
	{
		$beli_list = Pembelian::all();
		$jumlah_pembelian = Beli::count();

		$pembelian = Beli::all();
		
		$jumlah_keluar = DB::table('pembelians')->sum('total_bayar');
		return view('laporan.pembelian.pembelian', compact('beli_list', 'jumlah_pembelian', 'jumlah_keluar'));
	}

	public function printpembelian()
	{
		$beli_list = Pembelian::all();
		$jumlah_pembelian = Beli::count();

		$pembelian = Beli::all();
		
		$jumlah_keluar = DB::table('pembelians')->sum('total_bayar');
		return view('laporan.pembelian.print', compact('beli_list', 'jumlah_pembelian', 'jumlah_keluar'));
	}

	public function stok()
	{
		
		$bahan_list = Bahan::all();
		$jumlah_bahan = Bahan::count();
		return view('laporan.stok.stok', compact('bahan_list', 'jumlah_bahan'));
	}

	public function printstok()
	{
		
		$bahan_list = Bahan::all();
		$jumlah_bahan = Bahan::count();
		return view('laporan.stok.print', compact('bahan_list', 'jumlah_bahan'));
	}

	public function dapur()
	{
		$jual_list = Penjualan::all();
		$jumlah_penjualan = Jual::count();
		$penjualan = Penjualan::all();
		
		$jual = Jual::all();
		$jum = $jual->where('status','0');
		$jumlah_pesanan = $jum->count();

		return view('laporan.dapur.dapur', compact('jual_list', 'jumlah_penjualan', 'jumlah_pesanan'));
	}

	public function printdapur()
	{
		$jual_list = Penjualan::all();
		$jumlah_penjualan = Jual::count();
		$penjualan = Penjualan::all();
		
		$jual = Jual::all();
		$jum = $jual->where('status','0');
		$jumlah_pesanan = $jum->count();

		return view('laporan.dapur.print', compact('jual_list', 'jumlah_penjualan', 'jumlah_pesanan'));
	}
}
