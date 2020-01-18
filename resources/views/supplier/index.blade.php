@extends('template')

@section('main')
	<div id="supplier">
		<h2>Supplier</h2>

		@if (!empty($supplier_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>Nomer Hp</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody><?php $no=0 ?>
					<?php foreach ($supplier_list as $supplier): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $supplier->nama_supplier }}</td>
						<td>{{ $supplier->alamat }}</td>
						<td>{{ $supplier->no_hp }}</td>
						<td>
							<div class="box-button">
								{{ link_to('supplier/' . $supplier->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('supplier/' . $supplier->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['SupplierController@destroy', $supplier->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
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
				<strong>Jumlah Supplier : {{ $jumlah_supplier }}</strong>
			</div>
			<div class="paging">
				{{ $supplier_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="supplier/create" class="btn btn-primary">Tambah Supplier</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop