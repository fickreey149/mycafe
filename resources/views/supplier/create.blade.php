@extends('template')

@section('main')
	<div id="supplier">
		<h2>Tambah Supplier</h2>

		{!! Form::open(['url'=>'supplier']) !!}
			@include('supplier.form', ['submitButtonText' => 'Tambah Supplier'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop