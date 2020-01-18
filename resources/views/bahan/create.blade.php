@extends('template')

@section('main')
	<div id="bahan">
		<h2>Tambah Bahan Baku</h2>

		{!! Form::open(['url'=>'bahan']) !!}
			@include('bahan.form', ['submitButtonText' => 'Tambah Bahan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop