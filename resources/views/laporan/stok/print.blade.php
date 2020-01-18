@extends('template')

@section('main')
	<div id="penjualan">
<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/jquery-1.4.4.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>

		<h2>Laporan Stok Bahan Baku</h2>

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