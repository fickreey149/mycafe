<nav class="navbar navbar-default">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ url('/') }}">Kafe Nakula</a>
	</div>
	<div class="collapse navbar-collapse"
	id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="{{ url('daftar_produk') }}">Daftar Produk</a></li>
		</ul>
		@if (Auth::check() && Auth::user()->level == 'pelayan')
		<ul class="nav navbar-nav">
			<li><a href="{{ url('cart') }}">Keranjang Pesanan <span class="badge badge-light">{{Cart::count()}}</span></a></li>
		</ul>
		<ul class="nav navbar-nav">
			<li><a href="{{ url('cart/create') }}">Pemesanan</a></li>
		</ul>
		
		
		<ul class="nav navbar-nav">
			<li><a href="{{ url('pemesanan') }}">Daftar Pesanan</a></li>
		</ul>
		@endif

		@if (Auth::check() && Auth::user()->level == 'dapur')
		<ul class="nav navbar-nav">
			<li><a href="{{ url('bahan') }}">Daftar Bahan</a></li>
		</ul>

		<ul class="nav navbar-nav">
			<li><a href="{{ url('dapur') }}">Dapur</a></li>
		</ul>

		<ul class="nav navbar-nav">
			<li><a href="{{ url('penggunaan') }}">Penggunaan Bahan</a></li>
		</ul>

		<ul class="nav navbar-nav">
			<li><a href="{{ url('pembelian') }}">Pembelian Bahan</a></li>
		</ul>
		@endif

		@if (Auth::check() && Auth::user()->level == 'kasir')
		<ul class="nav navbar-nav">
			<li><a href="{{ url('penjualan') }}">Penjualan</a></li>
		</ul>
		@endif

		@if (Auth::check() && Auth::user()->level == 'admin')
		<ul class="nav navbar-nav">
			<li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('bahan') }}">Data Master
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="{{ url('bahan') }}">Bahan Baku</a></li>
		          <li><a href="{{ url('supplier') }}">Supplier</a></li>
		          <li><a href="{{ url('produk') }}">Produk</a></li>
		          <li><a href="{{ url('user') }}">User</a></li>
	        	</ul>
      		</li>
			
			<li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('pembelian') }}">Transaksi
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
					<li><a href="{{ url('penjualan') }}">Penjualan Produk</a></li>
			        <li><a href="{{ url('pembelian') }}">Pembelian Bahan Baku</a></li>
			        <li><a href="{{ url('dapur') }}">Dapur</a></li>
			        <li><a href="{{ url('penggunaan') }}">Penggunaan Bahan Baku</a></li>
			        <li><a href="{{ url('resep') }}">Resep</a></li>
	        	</ul>
      		</li>
      		<li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('laporan_jual') }}">Laporan
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
					<li><a href="{{ url('laporan_penjualan') }}">Laporan Penjualan</a></li>
			        <li><a href="{{ url('laporan_pembelian') }}">Laporan Pembelian</a></li>
			        <li><a href="{{ url('laporan_dapur') }}">Laporan Dapur</a></li>
			        <li><a href="{{ url('laporan_stok') }}">Laporan Stok</a></li>
	        	</ul>
      		</li>
      	</ul>
      		@endif

      	<ul class="nav navbar-nav">
			@if (!empty($halaman) && $halaman == 'about')
			<li class="active"><a href="{{ url('about') }}">About<span class="sr-only">(current)</span></a></li>
			@else
			<li><a href="{{ url('about') }}">About</a></li>
			@endif
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @else
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><strong>
                {{ Auth::user()->name }} ( {{ Auth::user()->level }} ) </strong><span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                <li>
                <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout</a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
            @endif
		</ul>
	</div>
</div>
</nav>