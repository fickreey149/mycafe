<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bahan;
use Validator;
use Session;

class BahanController extends Controller

{
	public function index()
	{
		$bahan_list = Bahan::orderBy('nama_bahan', 'asc')->paginate(10);
		$jumlah_bahan = Bahan::count();
		return view('bahan.index', compact('bahan_list', 'jumlah_bahan'));
	}

	public function show($id)
	{
		$bahan = Bahan::findOrFail($id);
		return view('bahan.show', compact('bahan'));
	}

	public function create()
	{
		return view('bahan.create');
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$validator = Validator::make($input, [
			'nama_bahan' => 'required|string|max:20',
			'satuan_bahan' => 'required|string'
		]);
		if ($validator->fails()) {
			return redirect('bahan/create')
				->withInput()
				->withErrors($validator);
		}
		Bahan::create($input);

		Session::flash('flash_message', 'Data Bahan Baku wez manjing bro...');
		
		return redirect('bahan');
	}

	public function edit($id)
	{
		$bahan = Bahan::findOrFail($id);
		return view('bahan.edit', compact('bahan'));
	}

	public function update($id, Request $request) 
	{
		$bahan = Bahan::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
			'nama_bahan' => 'required|string|max:20',
			'satuan_bahan' => 'required|string'
		]);
		if ($validator->fails()) {
			return redirect('bahan/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$bahan->update($request->all());

		Session::flash('flash_message', 'Data Bahan Baku berhasil diganti...');

		return redirect('bahan');
	}

	public function destroy($id)
	{
		$bahan = Bahan::findOrFail($id);
		$bahan->delete();
		Session::flash('flash_message', 'Data Bahan Baku berhasil dibusek...');
		Session::flash('penting', true);

		return redirect('bahan');
	}

}