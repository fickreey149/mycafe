@extends('template')

@section('main')
<div id="penjualan">
		<h2>Item Pemesanan</h2>

{!! Form::open(['url'=>'penjualan']) !!}
@include('cart.form', ['submitButtonText' => 'Bill'])	
{!! Form::close() !!}

			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0; 
					?>
					<?php foreach ($cartItems as $cartItem): ?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $cartItem->name }}</td>
						<td>{{ $cartItem->price }}</td>
						<td>
							{!! Form::open(['route'=>['cart.update', $cartItem->rowId], 'method' => 'PUT']) !!}
								<input name="qty" type="text" value="{{ $cartItem->qty }}" maxlength="3" size="2">
								
						</td>
						<td width="600px">Rp {{ $cartItem->subtotal }}</td>
						<td>
							<div class="box-button">
								<input type="submit" class="btn btn-warning btn-sm" value="Edit">
							{!! Form::close() !!}
							</div>
							<div class="box-button">
							{!! Form::open(['method' => 'DELETE', 'action' => ['CartController@destroy', $cartItem->rowId]]) !!}
							{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><strong>Total Bayar</strong></td>
						<td>Rp {{ Cart::total() }}</td>
					</tr>
				</tbody>
			</table>

		<div class="tombol-nav">
			<div class="box-button">
			<a href="cart/create" class="btn btn-success">Pesan menu lain</a>
			</div>
		</div>

</div>
@stop

@section('footer')
	@include('footer')
@stop