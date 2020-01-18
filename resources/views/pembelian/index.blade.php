@extends('template')

@section('main')
	<div id="pembelian">
		<h2>Transaksi Pembelian</h2>
		@include('_partial.flash_message')

		@if (!empty($pembelian_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pembelian</th>
						<th>Tanggal Pembelian</th>
						<th>Supplier</th>
						<th>Total Bayar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
					?>
					<?php foreach ($pembelian_list as $beli): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $beli->kode_beli }}</td>
						<td>{{ $beli->tanggal_pembelian }}</td>
						<td>{{ $beli->supplier->nama_supplier }}</td>
						<td>Rp {{ $beli->total_bayar }}</td>
						<td>
							<div class="box-button">
								{{ link_to('pembelian/' . $beli->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<!-- <div class="box-button">
								{{ link_to('pembelian/' . $beli->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div> -->
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action' => ['PembelianController@destroy', $beli->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Pembelian.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Pembelian : {{ $jumlah_pembelian }}</strong>
			</div>
			<div class="paging">
				{{ $pembelian_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="pembelian/create" class="btn btn-primary">Tambah Pembelian</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop