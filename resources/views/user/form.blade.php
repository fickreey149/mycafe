@if (isset($user))
	{!! Form::hidden('id', $user->id) !!}
@endif
@if ($errors->any())
<div class="form-group {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('name', 'Nama User :', ['class' => 'control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	@if ($errors->has('name'))
	<span class="help-block">{{ $errors->first('name') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	@if ($errors->has('email'))
	<span class="help-block">{{ $errors->first('email') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('level') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('level', 'Level :', ['class' => 'control-label']) !!}

	<div class="radio">
	<label>{!! Form::radio('level', 'pelayan') !!}Pelayan</label>
	</div>

	<div class="radio">
	<label>{!! Form::radio('level', 'dapur') !!}Dapur</label>
	</div>

	<div class="radio">
	<label>{!! Form::radio('level', 'kasir') !!}Kasir</label>
	</div>

	<div class="radio">
	<label>{!! Form::radio('level', 'admin') !!}Admin</label>
	</div>

	@if ($errors->has('level'))
	<span class="help-block">{{ $errors->first('level') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('password', 'Password :', ['class' => 'control-label']) !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
	@if ($errors->has('password'))
	<span class="help-block">{{ $errors->first('password') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('password_confirmation', 'Konfirmasi Password :', ['class' => 'control-label']) !!}
	{!! Form::password('password-confirmation', ['class' => 'form-control']) !!}
	@if ($errors->has('password_confirmation'))
	<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
	@endif
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>