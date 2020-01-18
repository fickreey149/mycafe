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
	{!! Form::text('nama_produk', null, ['class' => 'form-control']) !!}
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
	{!! Form::text('harga_produk', null, ['class' => 'form-control']) !!}
	@if ($errors->has('harga_produk'))
	<span class="help-block">{{ $errors->first('harga_produk') }}</span>
	@endif
</div>
		</td>

		<td width="50px"></td>

		<td></td>

	</tr>

	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('satuan_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('satuan_produk', 'Satuan Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('satuan_produk', null, ['class' => 'form-control']) !!}
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
	<div class="radio"> 
	<label>{!! Form::radio('kategori_produk', 'Makanan') !!} Makanan</label>
	</div>
	<div class="radio"> 
	<label>{!! Form::radio('kategori_produk', 'Minuman') !!} Minuman</label>
	</div>
	@if ($errors->has('kategori_produk'))
	<span class="help-block">{{ $errors->first('kategori_produk') }}</span>
	@endif
</div>
		</td>
	</tr>

	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('foto', 'Gambar :', ['class' => 'control-label']) !!}
	{!! Form::file('foto', null, ['class' => 'form-control']) !!}
	@if ($errors->has('foto'))
	<span class="help-block">{{ $errors->first('foto') }}</span>
	@endif
</div>
		</td>

		<td></td>

		<td>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
		</td>
	</tr>
</table>