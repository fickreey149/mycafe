@extends('template')

@section('main')
	<div id="supplier">
		<h2>Detail Supplier</h2>

		<table class="table table-striped">
			<tr>
				<th>Id</th>
				<td>{{ $supplier->id }}</td>
			</tr>
			<tr>
				<th>Nama Supplier</th>
				<td>{{ $supplier->nama_supplier }}</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>{{ $supplier->alamat }}</td>
			</tr>
			<tr>
				<th>Nomor Hp</th>
				<td>{{ $supplier->no_hp }}</td>
			</tr>
		</table>
	</div>
@stop

@section('footer')
	@include('footer')
@stop