@extends('template')

@section('main')
	<div id="bahan">
		<h2>Detail Bahan Baku</h2>

		<table class="table table-striped">
			<tr>
				<th>Id Bahan</th>
				<td>{{ $bahan->id }}</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td>{{ $bahan->nama_bahan }}</td>
			</tr>
			<tr>
				<th>Satuan</th>
				<td>{{ $bahan->satuan_bahan }}</td>
			</tr>
			<tr>
				<th>Stok</th>
				<td>{{ $bahan->stok_bahan }}</td>
			</tr>
		</table>
	</div>
@stop

@section('footer')
	@include('footer')
@stop