@if (isset($bahan))
	{!! Form::hidden('id', $bahan->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_bahan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_bahan', 'Nama Bahan Baku :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_bahan', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_bahan'))
	<span class="help-block">{{ $errors->first('nama_bahan') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('satuan_bahan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('satuan_bahan', 'Satuan Bahan Baku :', ['class' => 'control-label']) !!}
	{!! Form::text('satuan_bahan', null, ['class' => 'form-control']) !!}
	@if ($errors->has('satuan_bahan'))
	<span class="help-block">{{ $errors->first('satuan_bahan') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('stok_bahan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('stok_bahan', 'Stok Bahan Baku :', ['class' => 'control-label']) !!}
	{!! Form::text('stok_bahan', 0, ['class' => 'form-control', 'disabled'=>'true']) !!}
	@if ($errors->has('stok_bahan'))
	<span class="help-block">{{ $errors->first('stok_bahan') }}</span>
	@endif
</div>
<input type="hidden" name="stok_bahan" value="0">

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>