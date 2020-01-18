@if (isset($penjualan))
	{!! Form::hidden('id', $penjualan->id) !!}
@endif

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
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
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
					@foreach($list_produk as $key => $b)
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