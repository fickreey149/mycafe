@extends('template')

@section('main')
	<div id="penggunaan">
		<h2>Tambah Penggunaan Bahan Baku</h2>

		{!! Form::open(['url'=>'penggunaan']) !!}
			@include('penggunaan.form', ['submitButtonText' => 'Tambah Penggunaan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop