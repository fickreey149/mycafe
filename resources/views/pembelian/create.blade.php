@extends('template')

@section('main')
	<div id="pembelian">
		<h2>Tambah Pembelian</h2>

{!! Form::open(['url'=>'pembelian']) !!}
@if (isset($pembelian))
	{!! Form::hidden('id', $pembelian->id) !!}
@endif
@include('pembelian.form')

{!! Form::close() !!}


{!! Form::open(['url'=>'beli']) !!}
<div class="form-group">
	<table class="table" name="item_table" id="item_table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bahan Baku</th>
				<th>Harga Bahan</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
				<th style="text-align:center">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$no = 0; 
				?>
				<td>0</td>
				<td>
					<select class="form-control bahan" name="id" id="bahan">
						<option value="0" selected="true" disabled="true">Pilih Bahan Baku</option>
						@foreach($list_bahan as $key => $b)
						<option value="{!!$key+1!!}">{!!$b->nama_bahan!!}</option>
						@endforeach
					</select>
				</td>
				<td><input type="text" name="harga_bahan" class="form-control" placeholder="Harga Bahan">
				</td>
				<td><input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
				</td>
				<td><input type="text" name="total_harga" class="form-control" placeholder="Total Harga" disabled="true">
				</td>
				<td style="text-align:center">
					<div class="box-button">
					{!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm']) !!}
					</div>
				</td>					
			</tr>
{!! Form::close() !!}
 
			<?php foreach ($cartItems as $cartItem): ?>
			<tr>
				<td>{{ ++$no }}</td>
				<td>
				<input type="text" name="nama_bahan" class="form-control" value="{{$cartItem->name}}" disabled="true">
				</td>
				<td><input type="text" name="harga_bahan" class="form-control" value="Rp {{$cartItem->price}}" disabled="true">
				</td>
				<td><input type="text" name="jumlah" class="form-control" value="{{$cartItem->qty}}" disabled="true">
				</td>
				<td><input type="text" name="total_harga" class="form-control" value="Rp {{$cartItem->subtotal}}" disabled="true">
				</td>
				<td style="text-align:center">
				<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['BeliController@destroy', $cartItem->rowId]]) !!}
					{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
					{!! Form::close() !!}
				</div></button></td>
			</tr>
			<?php endforeach ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Bayar</strong></td>
				<td><strong>Rp {{Cart::total()}}</strong></td>
			</tr>                
		</tbody>
	</table>
</div>

	</div>

@stop

@section('footer')
	@include('footer')
@stop