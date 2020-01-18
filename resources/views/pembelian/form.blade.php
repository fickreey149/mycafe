<table>
	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('kode_beli') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif

<?php
$k = "";
if ($kode < 10) {
	$k = "PB00".$kode;
} elseif ($kode > 9 && $kode < 100) {
	$k = "PB0".$kode;
} elseif ($kode > 99 && $kode <1000) {
	$k = "PB".$kode;
}
  ?>

	{!! Form::label('kode_beli', 'Kode :', ['class' => 'control-label']) !!}
	</td>
	<td>
	{!! Form::text('kode_beli', $k, ['class' => 'form-control']) !!}
	@if ($errors->has('kode_beli'))
	<span class="help-block">{{ $errors->first('kode_beli') }}</span>
	@endif
</div>
	</td>

	<td width="50px"></td>

	<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('supplier_id') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_supplier', 'Supplier :', ['class' => 'control-label']) !!}
	</td>
	<td>
	@if(count($list_supplier) > 0)
	{!! Form::select('supplier_id', $list_supplier, null, ['class' => 'form-control', 'id' => 'supplier_id', 'placeholder' => 'Pilih Supplier']) !!}
	@else
		<p>Tidak ada pilihan Supplier... Buat dulu yaa...!</p>
	@endif

	@if ($errors->has('supplier_id'))
	<span class="help-block">{{ $errors->first('supplier_id') }}</span>
	@endif
</div>
	</td>
</tr>

<tr>
	<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_pembelian') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('tanggal_pembelian', 'Tanggal :', ['class' => 'control-label']) !!}
	</td>
	<td>
	{!! Form::date('tanggal_pembelian', null, ['class' => 'form-control']) !!}
	@if ($errors->has('tanggal_pembelian'))
	<span class="help-block">{{ $errors->first('tanggal_pembelian') }}</span>
	@endif
</div>
	</td>

	<td></td>
	<td></td>

	<td>
		{!! Form::submit('Pembelian', ['class' => 'btn btn-primary btn-sm']) !!}
	</td>
	
</tr>
<tr>
	<td height="25px"></td>
</tr>
</table>