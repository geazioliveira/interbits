<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Interbits - @yield('title')</title>

		<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
    </head>
    <body>


		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="/">Interbits</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active">
								<a href="/register">Listar usuários</a>
							</li>
							<li class="active">
								<a href="/functions">Listar funções</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

        <div class="container">

			@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			@if (session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
			@endif

			@yield('content')
        </div>


		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
    </body>
</html>