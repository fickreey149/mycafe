<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Nakula Cafe</title>

		<link href="{{ asset ('bootstrap_3_3_7/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset ('css/style.css') }}" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="{{ asset ('http://laravelapp.dev/js/html5shiv_3_7_3.min.js') }}"></script>
			<script src="{{ asset ('http://laravelapp.dev/js/respond_1_4_2.min.js') }}"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			@include('navbar')
			@yield('main')
		</div>

		@yield('footer')

	<script src="{{ asset ('js/jquery_3_3_1.min.js') }}"></script>
	<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset ('js/laravelapp.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>
	</body>
</html>