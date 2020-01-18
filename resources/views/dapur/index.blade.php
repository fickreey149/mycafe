@extends('template')

@section('main')
	<div id="dapur">
		<h2>Daftar Pesanan</h2>

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
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$s = "";
						$b = "";
					?>
		
					<?php foreach ($jual_list as $jual): ?>
						<?php if ($jual->status == 0) {
							$s = "Menunggu";
							$b = "Masak";
						} elseif ($jual->status == 1) {
							$s = "Memasak";
							$b = "Selesai";
						} elseif ($jual->status == 2) {
							$s = "Antar";
							$b = "Selesai";
						} else {
							$s = "Selesai";
							$b = "Selesai";
						}?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jual->penjualan->kode_jual }}</td>
						<td>{{ $jual->penjualan->tanggal_penjualan }}</td>
						<td>{{ $jual->penjualan->nama_konsumen }}</td>
						<td>{{ $jual->penjualan->no_meja }}</td>
						<td>{{ $jual->produk->nama_produk }}</td>
						<td>{{ $jual->jumlah }}</td>
						<td>{{ $s }}</td>
						<td>
							<div class="box-button">
								{!! Form::model($jual, ['method' => 'PATCH', 'action' => ['DapurController@update', $jual->id]]) !!}
								<input type="hidden" name="status" value="{{ $jual->status+1 }}">
								<?php if ($jual->status < 2) { ?>
									<input type="submit" name="edit" class="btn btn-success btn-sm" value="{{$b}}">
								<?php
								} else { ?>
									<input type="submit" name="edit" class="btn btn-success btn-sm" value="{{$b}}" disabled="true">
								<?php
								} ?>
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Penjualan.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Pesanan Belum Dibuat : {{ $jumlah_pesanan }}</strong>
				<br> <br>
				<strong>Total Pesanan : {{ $jumlah_penjualan }}</strong>
			</div>
			<div class="paging">
				{{ $jual_list->links() }}
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop