@extends('template')

@section('main')
	<div id="produk">
		<div class="col-md-12">
			<h2>Daftar Menu Makanan</h2>
		</div>
		@if (!empty($makanan_list))
		<div style="margin-top: 7px;">
		<?php foreach ($makanan_list as $makanan): ?>
			<div class="col-md-3">
					<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
						<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 2px;" align="center">
						@if (isset($makanan->foto))
						<img src="{{ asset('fotoupload/' .$makanan->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummyfood.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
						<h4 class="text-info">{{ $makanan->nama_produk }}</h4>
						<h4 class="text-danger">Rp {{ number_format($makanan->harga_produk,0,".",".") }},-</h4>
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
			<h2>Daftar Menu Minuman</h2>
		</div>
		@if (!empty($minuman_list))
		<div style="margin-top: 7px;">
		<?php foreach ($minuman_list as $minuman): ?>
			<div class="col-md-3">
					<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
						<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 2px;" align="center">
						@if (isset($minuman->foto))
						<img src="{{ asset('fotoupload/' .$minuman->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummydrink.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
						<h4 class="text-info">{{ $minuman->nama_produk }}</h4>
						<h4 class="text-danger">Rp {{ number_format($minuman->harga_produk,0,".",".") }},-</h4>
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
@stop

@section('footer')
	@include('footer')
@stop