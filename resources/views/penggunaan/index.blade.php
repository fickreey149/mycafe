@extends('template')

@section('main')
	<div id="penggunaan">
		<h2>penggunaan</h2>

		@if (!empty($penggunaan_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Tanggal</th>
						<th>Bahan Baku</th>
						<th>Jumlah</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0; 
					?>
					<?php foreach ($penggunaan_list as $penggunaan): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $penggunaan->kode_guna }}</td>
						<td>{{ $penggunaan->tgl_guna }}</td>
						<td>{{ $penggunaan->bahan->nama_bahan }}</td>
						<td>{{ $penggunaan->jumlah }}</td>
						<td>
							<div class="box-button"> 
								{{ link_to('penggunaan/' . $penggunaan->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['PenggunaanController@destroy', $penggunaan->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Penggunaan.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Penggunaan : {{ $jumlah_penggunaan }}</strong>
			</div>
			<div class="paging">
				{{ $penggunaan_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="penggunaan/create" class="btn btn-primary">Tambah Penggunaan</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop