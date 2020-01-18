@extends('template')

@section('main')
	<div id="produk">
		<h2>Edit Pemesanan</h2>

		{!! Form::model($jual, ['method' => 'PATCH', 'action' => ['PemesananController@baru', $jual->id]]) !!}
			@if (isset($jual))
	{!! Form::hidden('id', $jual->id) !!}
@endif

@if ($errors->any())
<div class="form-group {{ $errors->has('penjualan_id') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('penjualan_id', 'Kode :', ['class' => 'control-label']) !!}
	{!! Form::text('penjualan_id', null, ['class' => 'form-control']) !!}
	@if ($errors->has('penjualan_id'))
	<span class="help-block">{{ $errors->first('penjualan_id') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('tgl_guna') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('tgl_guna', 'Tanggal :', ['class' => 'control-label']) !!}
	{!! Form::text('tgl_guna', null, ['class' => 'form-control']) !!}
	@if ($errors->has('tgl_guna'))
	<span class="help-block">{{ $errors->first('tgl_guna') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('bahan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('bahan', 'Bahan Baku :', ['class' => 'control-label']) !!}
	@if(count($list_bahan) > 0)
	{!! Form::select('bahan_id', $list_bahan, null, ['class' => 'form-control', 'id' => 'bahan_id', 'placeholder' => 'Pilih Bahan Baku']) !!}
	@else
		<p>Tidak ada pilihan Bahan Baku... Buat dulu yaa...!</p>
	@endif

	@if ($errors->has('bahan_id'))
	<span class="help-block">{{ $errors->first('bahan_id') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('jumlah', 'Jumlah :', ['class' => 'control-label']) !!}
	{!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
	@if ($errors->has('jumlah'))
	<span class="help-block">{{ $errors->first('jumlah') }}</span>
	@endif
</div>


<div class="form-group">
	{!! Form::submit('Update Penggunaan', ['class' => 'btn btn-primary form-control']) !!}
</div>
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop