@extends('template')

@section('main')
	<div id="penjualan">
<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/jquery-1.4.4.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>

		<h2><center>Laporan Dapur Kafe Nakula</center></h2>

		@if (!empty($jual_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pemesanan</th>
						<th>Tanggal Masak</th>
						<th>Nama Konsumen</th>
						<th>No Meja</th>
						<th>Produk</th>
						<th>Jumlah</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$s = "";
					?>
		
					<?php foreach ($jual_list as $jual): ?>
						@foreach ($jual->orderItems as $item)
						<?php if ($item->pivot->status == 0) {
							$s = "Menunggu";
						} elseif ($item->pivot->status == 1) {
							$s = "Memasak";
						} elseif ($item->pivot->status == 2) {
							$s = "Antar";
						} else {
							$s = "Selesai";
						}?>
					
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jual->kode_jual }}</td>
						<td>{{ $jual->tanggal_penjualan }}</td>
						<td>{{ $jual->nama_konsumen }}</td>
						<td>{{ $jual->no_meja }}</td>
						<td>{{ $item->nama_produk }}</td>
						<td>{{ $item->pivot->jumlah }}</td>
						<td>{{ $s }}</td>
					</tr>
						@endforeach
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Dapur.</p>
		@endif

		<table class="table">
		<tr class="table-nav">
				<div class="jumlah-data">
				<td><strong>Jumlah Pesanan Belum Dibuat :</strong></td>
				<td><strong>{{ $jumlah_pesanan }}</strong></td>
				
			</div>
		</tr>
		
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Masak</strong></td>
					<td><strong>{{ $jumlah_penjualan }}</strong></td>
				</div>
		</tr>
		</table>
		

		<script>
    $(document).ready(function() {
        window.print();
    });
</script>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop