<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>StageVinder | @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/authentication.css') }}">
	<link rel="stylesheet" type="text/css" href="@yield('stylesheet')">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
    <section class="container">
    	<div class="container__inner">
    		<div class="container__row">
    			<div class="container__center">
    				<div class="auth__card">
    					@yield('content')
    				</div>
    			</div>
    		</div>
    	</div>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>