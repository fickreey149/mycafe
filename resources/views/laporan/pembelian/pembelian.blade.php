@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Laporan Pembelian</h2>

		@if (!empty($beli_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pembelian</th>
						<th>Tanggal Pembelian</th>
						<th>Nama Supplier</th>
						<th>Bahan Baku</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$s = "";
					?>
		
					<?php foreach ($beli_list as $beli): ?>
					@foreach ($beli->buyItems as $item)
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $beli->kode_beli }}</td>
						<td>{{ $beli->tanggal_pembelian }}</td>
						<td>{{ $beli->supplier->nama_supplier }}</td>
						<td>{{ $item->nama_bahan }}</td>
						<td>Rp {{ number_format($item->pivot->harga_bahan,0,".",".") }},-</td>
						<td>{{ $item->pivot->jumlah }}</td>
						<td>Rp {{ number_format($item->pivot->harga_bahan * $item->pivot->jumlah,0,".",".") }},-</td>
					</tr>
					@endforeach
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Pembelian.</p>
		@endif

		<table class="table">
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Pembelian</strong></td>
					<td><strong>{{ $jumlah_pembelian }}</strong></td>
				</div>
		</tr>
		
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Pengeluaran</strong></td>
					<td><strong>Rp {{ $jumlah_keluar }}.000</strong></td>
				</div>
		</tr>
		</table>

		<div class="form-group">
			{{ link_to('laporan_pembelian/print', ' Print', ['class' => 'btn btn-info glyphicon glyphicon-print pull-right']) }}
</div>
<br class="hidden-print">
<br class="hidden-print">
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop