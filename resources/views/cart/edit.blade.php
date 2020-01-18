@extends('template')

@section('main')
	<div id="produk">
		<h2>Edit Produk Baku</h2>

		{!! Form::model($produk, ['method' => 'PATCH', 'action' => ['ProdukController@update', $produk->id]]) !!}
			@include('produk.form', ['submitButtonText' => 'Update Produk'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop