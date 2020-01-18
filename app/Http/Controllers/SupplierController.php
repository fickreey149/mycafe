<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Supplier;
use Validator;

class SupplierController extends Controller
{
    public function index()
	{
		$supplier_list = Supplier::orderBy('nama_supplier', 'asc')->paginate(10);
		$jumlah_supplier = Supplier::count();
		return view('supplier.index', compact('supplier_list', 'jumlah_supplier'));
	}

	public function show($id)
	{
		$supplier = Supplier::findOrFail($id);
		return view('supplier.show', compact('supplier'));
	}

	public function create()
	{
		return view('supplier.create');
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$validator = Validator::make($input, [
			'nama_supplier' => 'required|string|max:20',
			'alamat' => 'required|string|max:30',
			'no_hp' => 'string|max:14'
		]);
		if ($validator->fails()) {
			return redirect('supplier/create')
				->withInput()
				->withErrors($validator);
		}
		Supplier::create($input);
		return redirect('supplier');
	}

	public function edit($id)
	{
		$supplier = Supplier::findOrFail($id);
		return view('supplier.edit', compact('supplier'));
	}

	public function update($id, Request $request)
	{
		$supplier = Supplier::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
			'nama_supplier' => 'required|string|max:20',
			'alamat' => 'required|string|max:30',
			'no_hp' => 'string|max:14'
		]);
		if ($validator->fails()) {
			return redirect('supplier/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$supplier->update($request->all());
		return redirect('supplier');
	}

	public function destroy($id)
	{
		$supplier = Supplier::findOrFail($id);
		$supplier->delete();
		return redirect('supplier');
	}
}
