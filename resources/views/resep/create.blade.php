@extends('template')

@section('main')
	<div id="produk">
		<h2>Tambah Produk</h2>

		
<div class="col-sm-6">
	{!! Form::open(['url'=>'resep', 'files'=>'true']) !!}
			@if (isset($produk))
	{!! Form::hidden('id', $produk->id) !!}
@endif
	<table>
	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_produk', 'Nama Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_produk', $produk->nama_produk, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_produk'))
	<span class="help-block">{{ $errors->first('nama_produk') }}</span>
	@endif
</div>
		</td>

		<td width="50px"></td>

		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('harga_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('harga_produk', 'Harga Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('harga_produk', $produk->harga_produk, ['class' => 'form-control']) !!}
	@if ($errors->has('harga_produk'))
	<span class="help-block">{{ $errors->first('harga_produk') }}</span>
	@endif
</div>
		</td>
	</tr>

	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('satuan_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('satuan_produk', 'Satuan Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('satuan_produk', $produk->satuan_produk, ['class' => 'form-control']) !!}
	@if ($errors->has('satuan_produk'))
	<span class="help-block">{{ $errors->first('satuan_produk') }}</span>
	@endif
</div>
		</td>

		<td></td>

		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('kategori_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('kategori_produk', 'Kategori Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('kategori_produk', $produk->kategori_produk, ['class' => 'form-control']) !!}
	@if ($errors->has('kategori_produk'))
	<span class="help-block">{{ $errors->first('kategori_produk') }}</span>
	@endif
</div>
		</td>
	</tr>
</table>

<div class="form-group">
	{!! Form::submit('Tambah Resep', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
</div>

<div class="col-sm-5">
	<?php  $no=0 ?>
	
		{!! Form::open(['url'=>'butuh']) !!}
	<h4><strong>Bahan Baku yang dibutuhkan :</strong></h4>
	<table class="table">
	<tr>
			<th>No.</th>
			<th>Nama Bahan Baku</th>
			<th style="text-align:center">Action</th>
	</tr>
	<tr>
		<td width="5px">
			No.
		</td>
		<td>
			<select class="form-control bahan" name="id" id="bahan">
				<option value="0" selected="true" disabled="true">Pilih Bahan Baku</option>
					@foreach($list_bahan as $key => $b)
				<option value="{!!$key+1!!}">{!!$b->nama_bahan!!}</option>
					@endforeach
			</select>
		</td>
		<td style="text-align:center">
			<div class="box-button">
			{!! Form::submit('Tambah', ['class' => 'btn btn-warning btn-sm']) !!}
			</div>
		</td>
		{!! Form::close() !!}
	</tr>

	<?php foreach ($cartItems as $cartItem): ?>
			<tr>
				<td>{{ ++$no }}</td>
				<td>
				<input type="text" name="nama_bahan" class="form-control" value="{{$cartItem->name}}" disabled="true">
				</td>
				<td style="text-align:center">
				<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['ButuhController@destroy', $cartItem->rowId]]) !!}
					{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
					{!! Form::close() !!}
				</div></button></td>
			</tr>
			<?php endforeach ?>
</table>
</div>


</div>



@stop

@section('footer')
	@include('footer')
@stop