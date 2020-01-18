@extends('template')

@section('main')
	<div id="produk">
		<h2>Detail Produk</h2>

		<table class="table table-striped">
			<tr>
				<th>Id produk</th>
				<td>{{ $produk->id }}</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td>{{ $produk->nama_produk }}</td>
			</tr>
			<tr>
				<th>Harga</th>
				<td>{{ $produk->harga_produk }}</td>
			</tr>
			<tr>
				<th>Satuan</th>
				<td>{{ $produk->satuan_produk }}</td>
			</tr>
			<tr>
				<th>Kategori</th>
				<td>{{ $produk->kategori_produk }}</td>
			</tr>
			<tr>
				<th>Stok Produk</th>
				<td>{{ $produk->stok_produk }}</td>
			</tr>
		</table>
	</div>
@stop

@section('footer')
	@include('footer')
@stop