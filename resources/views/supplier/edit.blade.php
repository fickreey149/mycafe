@extends('template')

@section('main')
	<div id="supplier">
		<h2>Edit Supplier</h2>

		{!! Form::model($supplier, ['method' => 'PATCH', 'action' => ['SupplierController@update', $supplier->id]]) !!}
			@include('supplier.form', ['submitButtonText' => 'Update Supplier'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop