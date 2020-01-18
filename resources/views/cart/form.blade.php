<table>
	<tr>
		<td width="150px">
@if ($errors->any())
<div class="form-group {{ $errors->has('kode_jual') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('kode_jual', 'Kode Penjualan ', ['class' => 'control-label']) !!}
		</td>

		<td width="150px">

	@if ($kode < 10)
	<input name="kode_jual" type="text" value="PJ00{{$kode}}" maxlength="7" size="5">
	@elseif ($kode >10 && $kode < 100)
	<input name="kode_jual" type="text" value="PJ0{{$kode}}" maxlength="7" size="5">
	@else
	<input name="kode_jual" type="text" value="PJ00{{$kode}}" maxlength="7" size="5">
	@endif
	
	@if ($errors->has('kode_jual'))
	<span class="help-block">{{ $errors->first('kode_jual') }}</span>
	@endif
</div>
		</td>

		<td width="20px"></td>

		<td width="150px">
@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_penjualan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('tanggal_penjualan', 'Tanggal Penjualan ', ['class' => 'control-label']) !!}
		</td>

		<td width="150px">
	<input name="tanggal_penjualan" type="date" value="" maxlength="8" size="8">
	@if ($errors->has('tanggal_penjualan'))
	<span class="help-block">{{ $errors->first('tanggal_penjualan') }}</span>
	@endif
</div>
		</td>
	</tr>


	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_konsumen') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_konsumen', 'Nama Konsumen ', ['class' => 'control-label']) !!}
		</td>
		<td>
	<input name="nama_konsumen" type="text" value="" maxlength="20" size="20">
	@if ($errors->has('nama_konsumen'))
	<span class="help-block">{{ $errors->first('nama_konsumen') }}</span>
	@endif
</div>
		</td>

		<td width="20px"></td>

		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('no_meja') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('no_meja', 'Nomor Meja ', ['class' => 'control-label']) !!}
		</td>
		<td>
	<input name="no_meja" type="text" value="" maxlength="20" size="20">
	@if ($errors->has('no_meja'))
	<span class="help-block">{{ $errors->first('no_meja') }}</span>
	@endif
</div>
		</td>
	</tr>

	<tr>
		<td>
		<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</div>
		</td>
	</tr>
</div>
</table>