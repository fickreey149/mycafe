@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Tambah Penjualan</h2>

		{!! Form::open(['url'=>'penjualan/add-to-cart/{penjualan}']) !!} 
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
						<h4 class="text-danger">Rp {{ $produk->harga_produk }}</h4>
						<input type="text" name="jumlah" value="1" class="form-control">
						<input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
						<input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}" class="form-control">
						<input type="hidden" name="id" value="{{ $produk->id }}" class="form-control">

						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px"> 
								{{ link_to('penjualan/add-to-cart/' . $produk->id, 'Pesan', ['class' => 'btn btn-success btn-sm']) }}
						</div>
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
						<h4 class="text-danger">Rp {{ $produk->harga_produk }}</h4>
						<input type="text" name="jumlah" value="1" class="form-control">
						<input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
						<input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}" class="form-control">
						<input type="hidden" name="id" value="{{ $produk->id }}" class="form-control">

						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px">
								{{ link_to('penjualan/add-to-cart/' . $produk->id, 'Pesan', ['class' => 'btn btn-success btn-sm']) }}
						</div>
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


		{!! Form::open(['url'=>'penjualan']) !!}
		<div style="margin-top: 10px;" class="table-nav">
			@if ($errors->any())
			<div class="form-group {{ $errors->has('kode_jual') ? 'has-error' : 'has-success' }}">
			@else
			<div class="form-group">
			@endif
				{!! Form::label('kode_jual', 'Kode Penjualan :', ['class' => 'control-label']) !!}
				{!! Form::text('kode_jual', null, ['class' => 'form-control']) !!}
				@if ($errors->has('kode_jual'))
				<span class="help-block">{{ $errors->first('kode_jual') }}</span>
				@endif
			</div>

			@if ($errors->any())
			<div class="form-group {{ $errors->has('tanggal_penjualan') ? 'has-error' : 'has-success' }}">
			@else
			<div class="form-group">
			@endif
				{!! Form::label('tanggal_penjualan', 'Tanggal Penjualan :', ['class' => 'control-label']) !!}
				{!! Form::date('tanggal_penjualan', null, ['class' => 'form-control']) !!}
				@if ($errors->has('nama_produk'))
				<span class="help-block">{{ $errors->first('tanggal_penjualan') }}</span>
				@endif
			</div>

			@if ($errors->any())
			<div class="form-group {{ $errors->has('nama_konsumen') ? 'has-error' : 'has-success' }}">
			@else
			<div class="form-group">
			@endif
				{!! Form::label('nama_konsumen', 'Nama Konsumen :', ['class' => 'control-label']) !!}
				{!! Form::text('nama_konsumen', null, ['class' => 'form-control']) !!}
				@if ($errors->has('nama_konsumen'))
				<span class="help-block">{{ $errors->first('nama_konsumen') }}</span>
				@endif

				@if ($errors->has('nama_konsumen'))
				<span class="help-block">{{ $errors->first('nama_konsumen') }}</span>
				@endif
			</div>

			@if ($errors->any())
			<div class="form-group {{ $errors->has('total_bayar') ? 'has-error' : 'has-success' }}">
			@else
			<div class="form-group">
			@endif
				{!! Form::label('total_bayar', 'Total Bayar :', ['class' => 'control-label']) !!}
				{!! Form::text('total_bayar', null, ['class' => 'form-control']) !!}
				@if ($errors->has('total_bayar'))
				<span class="help-block">{{ $errors->first('total_bayar') }}</span>
				@endif
			</div>

			<div class="form-group">
				<table class="table table-bordered" name="item_table" id="item_table">
					<thead>
						<tr>
							<th>Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th style="text-align:center"><button type="button" name="add" id="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
							<select class="form-control produk" name="nama_produk[]" id="nama_produk">
								<option value="0" selected="true" disabled="true">Plih Produk</option>
								@foreach($produk_list as $key => $b)
								<option value="{!!$key!!}">{!!$b!!}</option>
								@endforeach
							</select>
							</td>
							<td><input type="text" name="harga_produk[]" class="form-control harga_produk" placeholder="Harga Produk">
							</td>
							<td><input type="text" name="jumlah[]" class="form-control jumlah" placeholder="Jumlah">
							</td>
							<td><input type="text" name="total_harga[]" class="form-control total_harga" placeholder="Total Harga">
							</td>
							<td style="text-align:center"><button type="button" name="remove" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>
						</tr>              
					</tbody>
				</table>
			</div>
			<div class="form-group">
				<input type="submit" name="penjualan" value="Pesan" class="btn btn-success">
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@stop

@section('footer')
	@include('footer')
@stop