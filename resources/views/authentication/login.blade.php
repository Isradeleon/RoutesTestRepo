<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="mdl/material.min.css" rel="stylesheet">
    <link href="/mdl/mdl-icons/for-icons.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<div class="container">
	<div class="row">
		<div class="col-md-6" align="center">
		</div>
		<div class="col-md-5">
		<h4>Login</h4>
		<form id="formulario" class="horizontal" method="post" action="/">
			{{ csrf_field() }}
			@if(Session::has('email'))
			<fieldset class="form-group">
				<label for="email">E-Mail</label>
				<input class="form-control" placeholder="Type your email" type="email" name="email" id="email" 
				value="{{Session::get('email')}}" autofocus>
			</fieldset>
			@else
			<fieldset class="form-group">
				<label for="email">E-Mail</label>
				<input class="form-control" placeholder="Type your email" type="email" name="email" id="email">
			</fieldset>
			@endif
			<fieldset class="form-group">
				<label for="password">Password</label>
				<input class="form-control" placeholder="Type your password" type="password" name="password" id="password">
			</fieldset>
			<fieldset class="pull-right">
				<button id="bttn" class="btn btn-primary">Login</button>
			</fieldset>
		</form>
		<a href="/registration">Sign me up!</a>
		</div>
	</div>
	@if(Session::has('errors'))
	<br>
	<div class="row">
		<div class="col-md-6" align="center">
		</div>
		<div class="col-md-5">
		@foreach(Session::get('errors') as $error)
		<p align="center" 
		style="font-size: 16px; 
				color: #900;">*{{$error}}*</p>
		@endforeach
		</div>
	</div>
	@endif
	</div>
</div>
<!-- Scripts -->
<script src="/jQuery/jquery-3.1.0.min.js"></script>
<script src="/jQuery/jquery.validate.min.js"></script>
<script src="/js/app.js"></script>
<script src="/mdl/material.min.js"></script>
</body>
</html>