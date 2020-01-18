@extends('template')

@section('main')
{!! Form::open() !!}
	<div id="penjualan">
		<h2>Detail Pembelian</h2>

		<table class="table">
			<tr>
				<th>Kode Pembelian</th>
				<td>: {{ $pembelian->kode_beli }}</td>
				<th></th>
				<td></td>
				<th>Nama Supplier</th>
				<td>: {{ $pembelian->supplier->nama_supplier }}</td>
				<td width="600px"></td>
			</tr>
			<tr>
				<th>Tanggal Pembelian</th>
				<td>: {{ $pembelian->tanggal_pembelian }}</td>
				<th></th>
				<td></td>
			</tr>
			
		</table>
		<table class="table">
			<tr>
			<th>No</th>
			<th>Bahan Baku</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			</tr>
			<?php
			$no = 1;
			?>
			@foreach ($pembelian->buyItems as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_bahan }}</td>
				<td>Rp {{ $item->pivot->harga_bahan }}</td>
				<td>{{ $item->pivot->jumlah }}</td>
				<td>Rp {{ $item->pivot->jumlah * $item->pivot->harga_bahan}}</td>
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Bayar :</strong></td>
				<td><strong>Rp {{ $pembelian->total_bayar }}</strong></td>
			</tr>
		</table>

		</div>
	</div>
{!! Form::close() !!}
@stop

@section('footer')
	@include('footer')
@stop