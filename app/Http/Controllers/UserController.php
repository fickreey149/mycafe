<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Session;

class UserController extends Controller
{
    public function index()
	{
		$user_list = User::all();
		return view('user.index', compact('user_list'));
	}

	public function show($id)
	{
		return redirect('user');
	}

	public function create()
	{
		return view('user.create');
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$validator = Validator::make($input, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:100|unique:users',
			'password' => 'required|min:6',
			'level' => 'required|in:admin,dapur,pelayan,kasir'
		]);

		if ($validator->fails()) {
			return redirect('user/create')
				->withInput()
				->withErrors($validator);
		}

		$input['password'] = bcrypt($input['password']);
		User::create($input);

		Session::flash('flash_message', 'User berhasil terdaftar bro...');
		
		return redirect('user');
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user.edit', compact('user'));
	}

	public function update($id, Request $request) 
	{
		$user = User::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:100|unique:users',
			'password' => 'required|min:6',
			'level' => 'required|in:admin,dapur,pelayan,kasir'
		]);

		if ($validator->fails()) {
			return redirect('user/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		if ($request->has('password')) {

			$input['password'] = bcrypt($input['password']);
		} else {

			$input = array_except($input, ['password']);
		}

		$user->update($request->all());

		Session::flash('flash_message', 'Data user berhasil diganti...');


		return redirect('user');
	}

	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		Session::flash('flash_message', 'Data user berhasil dibusek...');
		Session::flash('penting', true);

		return redirect('user');
	}
}
