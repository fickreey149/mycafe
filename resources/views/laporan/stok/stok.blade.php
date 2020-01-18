@extends('template')

@section('main')
<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/jquery-1.4.4.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>
	<div id="penjualan">
		<h2>Laporan Stok</h2>

		@if (!empty($bahan_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Satuan</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody><?php $no=0 ?>
					<?php foreach ($bahan_list as $bahan): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $bahan->nama_bahan }}</td>
						<td>{{ $bahan->satuan_bahan }}</td>
						<td>{{ $bahan->stok_bahan }}</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada Laporan Stok Bahan Baku.</p>
		@endif

		<table class="table">
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Bahan Baku</strong></td>
					<td><strong>{{ $jumlah_bahan }}</strong></td>
				</div>
		</tr>
		</table>

		<div class="form-group">
			{{ link_to('laporan_stok/print', ' Print', ['class' => 'btn btn-info glyphicon glyphicon-print pull-right']) }}
</div>
<br class="hidden-print">
<br class="hidden-print">
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop