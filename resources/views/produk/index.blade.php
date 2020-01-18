@extends('template')

@section('main')
	<div id="produk">
		<h2>Produk</h2>

		@if (!empty($produk_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Satuan</th>
						<th>Kategori</th>
						<th>Stok Produk</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0; 
						$s = 0;
						$h = 0;
					?>
					<?php foreach ($produk_list as $produk): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $produk->nama_produk }}</td>
						<td>Rp {{ number_format($produk->harga_produk,0,".",".") }},-</td>
						<td>{{ $produk->satuan_produk }}</td>
						<td>{{ $produk->kategori_produk }}</td>
						@if(count($produk->butuhItems) > 0)
						<?php 
						$h = count($produk->butuhItems);
						$s=0; ?>
						@foreach ($produk->butuhItems as $item)
							@if($item->stok_bahan > 0)
								<?php $s= $s+1; ?>
							@else
								<?php $s= $s; ?>
							@endif
						@endforeach
						@endif

						<?php if ($s==$h) { ?>
						<td>Tersedia</td>
						<?php } else { ?>
						<td>Kosong</td>
						<?php } ?>
						<td>
							<div class="box-button">
								{{ link_to('produk/' . $produk->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('produk/' . $produk->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['ProdukController@destroy', $produk->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Produk.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Produk : {{ $jumlah_produk }}</strong>
			</div>
			<div class="paging">
				{{ $produk_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="produk/create" class="btn btn-primary">Tambah produk</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop