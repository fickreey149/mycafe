@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Transaksi Penjualan</h2>

		@if (!empty($penjualan_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Penjualan</th>
						<th>Tanggal Penjualan</th>
						<th>Nama Konsumen</th>
						<th>No Meja</th>
						<th>Total Bayar</th>
						<th>User</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
					?>
					@foreach ($penjualan_list as $jual)
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jual->kode_jual }}</td>
						<td>{{ $jual->tanggal_penjualan }}</td>
						<td>{{ $jual->nama_konsumen }}</td>
						<td>{{ $jual->no_meja }}</td>
						<td>Rp {{ $jual->total_bayar }}</td>
						<td>{{ $jual->user->name }}</td>
						<td>
							<div class="box-button">
								{{ link_to('penjualan/' . $jual->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action' => ['PenjualanController@destroy', $jual->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Tidak ada data Penjualan.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Penjualan : {{ $jumlah_penjualan }}</strong>
			</div>
			<div class="paging">
				{{ $penjualan_list->links() }}
			</div>
		</div>

		
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop