@extends('template')

@section('main')
{!! Form::open() !!}
<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/jquery-1.4.4.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>
	<div id="penjualan">
		<h3><strong>Nota Penjualan</strong></h3>

		<table class="table">
			<tr>
				<th>Kode Penjualan</th>
				<td>: {{ $penjualan->kode_jual }}</td>
				<th></th>
				<td></td>
				<th>Nama Konsumen</th>
				<td>: {{ $penjualan->nama_konsumen }}</td>
				<td width="200px"></td>
			</tr>
			<tr>
				<th>Tanggal Penjualan</th>
				<td>: {{ $penjualan->tanggal_penjualan }}</td>
				<th></th>
				<td></td>
				<th>No Meja</th>
				<td>: {{ $penjualan->no_meja }}</td>
			</tr>
			<tr>
				<th>Pelayan</th>
				<td>: {{ $penjualan->user->name }}</td>
			</tr>
		</table>
		<table class="table">
			<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			</tr>
			<?php
			$no = 1;
			?>
			@foreach ($penjualan->orderItems as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_produk }}</td>
				<td>Rp {{ $item->harga_produk }}</td>
				<td>{{ $item->pivot->jumlah }}</td>
				<td>Rp {{ $item->pivot->jumlah * $item->harga_produk}}</td>
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Bayar :</strong></td>
				<td><strong>Rp {{ $penjualan->total_bayar }}</strong></td>
			</tr>
		</table>
		<script>
    $(document).ready(function() {
        window.print();
    });
</script>
		
	</div>
{!! Form::close() !!}
@stop

@section('footer')
	@include('footer')
@stop