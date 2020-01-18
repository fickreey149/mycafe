@if (isset($produk))
	{!! Form::hidden('id', $produk->id) !!}
@endif

<?php
$k = "PG".$kode;
?>

@if ($errors->any())
<div class="form-group {{ $errors->has('kode_guna') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('kode_guna', 'Kode :', ['class' => 'control-label']) !!}
	{!! Form::text('kode_guna', $k, ['class' => 'form-control']) !!}
	@if ($errors->has('kode_guna'))
	<span class="help-block">{{ $errors->first('kode_guna') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('tgl_guna') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('tgl_guna', 'Tanggal :', ['class' => 'control-label']) !!}
	{!! Form::date('tgl_guna', null, ['class' => 'form-control']) !!}
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
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>