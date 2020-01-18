@extends('template')

@section('main')
	<div id="bahan">
		<h2>Bahan Baku</h2>

		@include('_partial.flash_message')

		@if (!empty($bahan_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Bahan Baku</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Satuan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody><?php $no=0 ?>
					<?php foreach ($bahan_list as $bahan): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $bahan->nama_bahan }}</td>
						<td></td>
						<td>{{ $bahan->stok_bahan }}</td>
						<td>{{ $bahan->satuan_bahan }}</td>
						<td>
							<div class="box-button">
								{{ link_to('bahan/' . $bahan->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('bahan/' . $bahan->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['BahanController@destroy', $bahan->id]]) !!}
								{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Bahan Baku.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Bahan Baku : {{ $jumlah_bahan }}</strong>
			</div>
			<div class="paging">
				{{ $bahan_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="bahan/create" class="btn btn-primary">Tambah Bahan</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop