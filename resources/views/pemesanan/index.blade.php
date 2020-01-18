@extends('template')

@section('main')
{!! Form::open() !!}
	<div id="pemesanan">
		<h2>Daftar Pesanan</h2>

		@foreach ($penjualan_list as $penjualan)
		<table class="table">
			<tr>
				<th>Kode Pemesanan</th>
				<td>: {{ $penjualan->kode_jual }}</td>
				<th></th>
				<td></td>
				<th>Nama Konsumen</th>
				<td>: {{ $penjualan->nama_konsumen }}</td>
				<td width="600px"></td>
			</tr>
			<tr>
				<th>Tanggal Penjualan</th>
				<td>: {{ $penjualan->tanggal_penjualan }}</td>
				<th></th>
				<td></td>
				<th>No Meja</th>
				<td>: {{ $penjualan->no_meja }}</td>
			</tr>
			<tr>
				<th>Pelayan</th>
				<td>: {{ $penjualan->user->name }}</td>
			</tr>
		</table>
		<table class="table">
			<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			<th>Status</th>
			<th>Action</th>
			</tr>
			<?php
			$no = 1;
			?>
			@foreach ($penjualan->orderItems as $item)
			<?php if ($item->pivot->status == 0) {
							$s = "Menunggu";
						} elseif ($item->pivot->status == 1) {
							$s = "Memasak";
						} elseif ($item->pivot->status == 2) {
							$s = "Antar";
						} else {
							$s = "Selesai";
						}?>
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_produk }}</td>
				<td>Rp {{ $item->harga_produk }}</td>
				<td>{{ $item->pivot->jumlah }}</td>
				<td>Rp {{ $item->pivot->jumlah * $item->harga_produk}}</td>
				<td>{{ $s }}</td>
				<td>
					<div class="box-button">
						{!! Form::open(['url'=>'pemesanan']) !!}
						<input type="hidden" name="penjualan_id" value="{{$penjualan->id}}">
						<input type="hidden" name="produk_id" value="{{$item->id}}">
						<?php if ($item->pivot->status < 2) { ?>
						{!! Form::submit('Selesai', ['class' => 'btn btn-success btn-sm', 'disabled'=>'true']) !!}
						<?php
							} elseif ($item->pivot->status > 2) { ?>
							{!! Form::submit('Selesai', ['class' => 'btn btn-success btn-sm', 'disabled'=>'true']) !!}
							<?php
							} else { ?>
						{!! Form::submit('Selesai', ['class' => 'btn btn-success btn-sm']) !!}
							<?php
							} ?>
						{!! Form::close() !!}
					</div>

					<div class="box-button">
						{!! Form::open(['url'=>'pemesanan/hapus']) !!}
						<input type="hidden" name="penjualan_id" value="{{$penjualan->id}}">
						<input type="hidden" name="produk_id" value="{{$item->id}}">
						<?php if ($item->pivot->status == 0) { ?>
						{!! Form::submit('Batal', ['class' => 'btn btn-danger btn-sm']) !!}
						<?php } else { ?>
						{!! Form::submit('Batal', ['class' => 'btn btn-danger btn-sm', 'disabled'=>'true']) !!}
						<?php } ?>
						{!! Form::close() !!}
					</div>
					<!-- <div class="box-button">
								{!! Form::open(['url'=>'pemesanan/ganti']) !!}
								<input type="hidden" name="penjualan_id" value="{{$penjualan->id}}">
								<input type="hidden" name="produk_id" value="{{$item->id}}">
								<?php if ($item->pivot->status < 1) { ?>
									{!! Form::submit('Edit', ['class' => 'btn btn-warning btn-sm']) !!}
								<?php
								} else { ?>
									{!! Form::submit('Edit', ['class' => 'btn btn-warning btn-sm', 'disabled'=>'true']) !!}
								<?php
								} ?>
								{!! Form::close() !!}
					</div> -->
				</td>
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Harga :</strong></td>
				<td><strong>Rp {{ $penjualan->total_bayar }}</strong></td>
			</tr>
		</table>
		<table class="table" border="1px">
			
		</table>
		@endforeach
	
		</div>
	</div>
{!! Form::close() !!}
@stop

@section('footer')
	@include('footer')
@stop