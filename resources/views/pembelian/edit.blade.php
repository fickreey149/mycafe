@extends('template')

@section('main')
	<div id="pembelian">
		<h2>Edit Bahan Baku</h2>

		{!! Form::model($pembelian, ['method' => 'PATCH', 'action' => ['PembelianController@update', $pembelian->id]]) !!}
			@include('pembelian.form', ['submitButtonText' => 'Update Pembelian'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop