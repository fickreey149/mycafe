@extends('template')

@section('main')
	<div id="produk">
		<h2>Produk</h2>

		@if (!empty($produk_list))
		<?php
		$s = 0;
		$h = 0;
		$n = 1;
		?>
		<?php foreach ($produk_list as $produk): ?>
			<div class="col-sm-12">
			<h3><strong>{{$n++}}. {{ $produk->nama_produk }}</strong></h3>
			<div class="col-sm-8">
				<table class="table">
			<tr>
				<th>Nama Produk</th>
				<td>: {{ $produk->nama_produk }}</td>
				<th></th>
				<td></td>
				<th>Harga Produk</th>
				<td>: {{ $produk->harga_produk }}</td>
				<th></th>
				<td></td>
				<th>Stok</th>

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
					<td>: Tersedia</td>
					<?php } else { ?>
					<td>: Kosong</td>
					<?php } ?>
				<td></td>
			</tr>
			<tr>
				<th>Satuan</th>
				<td>: {{ $produk->satuan_produk }}</td>
				<th></th>
				<td></td>
				<th>Kategori</th>
				<td>: {{ $produk->kategori_produk }}</td>
				<td></td>
				<th></th>
				<td>
					<div class="box-button">
					{{ link_to('resep/create/' . $produk->id, 'Tambah Resep', ['class' => 'btn btn-success btn-sm']) }}
				</div>
				</td>
			</tr>
		</table>
		<table class="table">
			<h5><strong>Bahan-bahan yang dibutuhkan :</strong></h5>
			<tr>
			<th width="70px">No</th>
			<th>Bahan Baku</th>
			<th>Stok</th>
			<th>Action</th>
			<th width="200px"></th>
			</tr>
			<?php
			$no = 1;
			?>
			@if(count($produk->butuhItems) > 0)
			@foreach ($produk->butuhItems as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_bahan }}</td>
				<td>{{ $item->stok_bahan }} {{ $item->satuan_bahan }}</td>
				<td>
					{!! Form::open(['url'=>'resep/hapus']) !!}
					<input type="hidden" name="bahan_id" value="{{$item->id}}">
					<input type="hidden" name="produk_id" value="{{$produk->id}}">
					{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
					{!! Form::close() !!}
				</td>
				<td></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td></td>
				<td width="250px">
				<span>Bahan yang dibutuhkan belum diinput...</span>
				</td>
			</tr>
			@endif
		</table>
		</div>
			<div class="col-sm-2">
				@if (isset($produk->foto))
						<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummydrink.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
			</div>
			<div class="col-sm-2">
				
			</div>
		</div>
		<div class="col-sm-12">
			<h2></h2>
		</div>
				
		<?php endforeach ?>
	</div>
		@else
			<p>Tidak ada data Produk.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Resep : {{ $jumlah_produk }}</strong>
			</div>
			<div class="paging">
				{{ $produk_list->links() }}
			</div>
		</div>

		
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop