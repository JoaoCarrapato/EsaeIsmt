<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ISMT/ESAE</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	</head>

	<body>
		<header>
			@include('layouts.includes.menu')
		</header>

		<main>

			<div class="container-fluid">
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
			</div>

			<div class="container-fluid">
				@if(session('flash_message'))
			    	<div class="alert alert-success">
			    		{{ session('flash_message') }}
			    	</div>
				@endif
			</div>

			@yield('content')
		</main>

		<footer class="footer navbar-inverse navbar-fixed-bottom">

		</footer>

		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>
