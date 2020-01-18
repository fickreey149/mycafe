@extends('template')

@section('main')
	<div id="cart">
		<h2>Pemesanan</h2>

		{!! Form::open() !!} 

		@include('_partial.flash_message')
		<div class="col-md-12">
			<h3>Menu Makanan</h3>
		</div>

		@if (!empty($makanan_list))
		<div style="margin-top: 7px;">
		<?php foreach ($makanan_list as $produk): ?>
			<div class="col-md-3">
					<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
						<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 2px;" align="center">
						@if (isset($produk->foto))
						<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummyfood.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
						<h4 class="text-info">{{ $produk->nama_produk }}</h4>
						<h4 class="text-danger">Rp {{ number_format($produk->harga_produk,0,".",".") }},-</h4>
						<input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
						<input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}" class="form-control">
						<input type="hidden" name="id" value="{{ $produk->id }}" class="form-control">

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
							<h4><strong>Tersedia</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px"> 
							{{ link_to('cart/' . $produk->id. '/edit', 'Pesan', ['class' => 'btn btn-success btn-sm']) }}
						</div>
						<?php } else { ?>
							<h4><strong>Kosong</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px"> 
							{{ link_to('cart/' . $produk->id. '/edit', 'Pesan', ['class' => 'btn btn-success btn-sm', 'disabled'=>'true']) }}
						</div>
						<?php } ?>
						</div>
					</div>		
			</div>
		<?php endforeach ?>
		</div>
		<div>
		@else
			<p>Sorry bro, makanan udah habis...</p>
		@endif
		</div>

		<div class="col-md-12">
			<h2></h2>
			<h2></h2>
		</div>

		<div class="col-md-12">
			<h3> Menu Minuman</h3>
		</div>
		
		@if (!empty($minuman_list))
		<div style="margin-top: 7px;">
		<?php foreach ($minuman_list as $produk): ?>
			<div class="col-md-3">
					<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
						<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 2px;" align="center">
						@if (isset($produk->foto))
						<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummydrink.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
						<h4 class="text-info">{{ $produk->nama_produk }}</h4>
						<h4 class="text-danger">Rp {{ number_format($produk->harga_produk,0,".",".") }},-</h4>
						<input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
						<input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}" class="form-control">
						<input type="hidden" name="id" value="{{ $produk->id }}" class="form-control">

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
							<h4><strong>Tersedia</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px"> 
							{{ link_to('cart/' . $produk->id. '/edit', 'Pesan', ['class' => 'btn btn-success btn-sm']) }}
						</div>
						<?php } else { ?>
							<h4><strong>Kosong</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px"> 
							{{ link_to('cart/' . $produk->id. '/edit', 'Pesan', ['class' => 'btn btn-success btn-sm', 'disabled'=>'true']) }}
						</div>
						<?php } ?>
						</div>
					</div>		
			</div>
		<?php endforeach ?>
		</div>
		<div>
		@else
			<p>Sorry bro, minuman udah habis...</p>
		@endif
		</div>
		{!! Form::close() !!}

	</div>

@stop

@section('footer')
	@include('footer')
@stop