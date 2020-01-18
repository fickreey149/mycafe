@if (isset($supplier))
	{!! Form::hidden('id', $supplier->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_supplier') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_supplier', 'Nama Supplier :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_supplier', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_supplier'))
	<span class="help-block">{{ $errors->first('nama_supplier') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
	{!! Form::text('alamat', null, ['class' => 'form-control']) !!}
	@if ($errors->has('alamat'))
	<span class="help-block">{{ $errors->first('alamat') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('no_hp', 'Nomer Hp :', ['class' => 'control-label']) !!}
	{!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
	@if ($errors->has('no_hp'))
	<span class="help-block">{{ $errors->first('no_hp') }}</span>
	@endif
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>