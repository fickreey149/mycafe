@extends('template')

@section('main')
	<div id="produk">
		<h2>Detail Produk</h2>

		<table class="table">
			<tr>
				<th>Nama Produk</th>
				<td>: {{ $produk->nama_produk }}</td>
				<th></th>
				<td></td>
				<th>Harga Produk</th>
				<td>: Rp {{ number_format($produk->harga_produk,0,".",".") }},-</td>
				<th></th>
				<td></td>
				<th>Stok</th>
				<?php 
				$s = 0;
				$h = 1;
				 ?>
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
				<td width="550px"></td>
			</tr>
			<tr>
				<th>Satuan</th>
				<td>: {{ $produk->satuan_produk }}</td>
				<th></th>
				<td></td>
				<th>Kategori</th>
				<td>: {{ $produk->kategori_produk }}</td>
			</tr>
		</table>
		<table class="table">
			<h4><strong>Bahan-bahan yang dibutuhkan :</strong></h4>
			<tr>
			<th width="70px">No</th>
			<th>Bahan Baku</th>
			<th>Stok</th>
			<th width="600px"></th>
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
				<td></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td></td>
				<td width="250px"><p>Item Bahan Baku belum diinput...!</p></td>
				<td></td>
			</tr>
			@endif
		</table>
	</div>
@stop

@section('footer')
	@include('footer')
@stop