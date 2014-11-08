<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RT Application Submission</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">

		<div class="page-header">
			<h1>Rooster Teeth <small>Developer Application</small></h1>
		</div>
	
		@if (isset($info))
			<div role="alert" class="alert alert-info">{{ $info }}</div>
		@endif

		@if (isset($error))
			<div role="alert" class="alert alert-danger">{{ $error }}</div>
		@endif

		{{ Form::open([ 'route' => 'app.submit', 'method' => 'post', 'role' => 'form', 'files' => true ]) }}

		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', null, [ 'class' => 'form-control' ]) }}
		</div>

		<div class="form-group">
			{{ Form::label('resume', 'Resume') }}
			{{ Form::file('resume', null, [ 'class' => 'form-control' ]) }}
		</div>

		{{ Form::submit('Send', [ 'class' => 'btn btn-lg btn-primary btn-block' ]) }}

		{{ Form::close() }}
	</div>
	<!-- <script src="/bootstrap/js/bootstrap.js"></script> -->
</body>
</html>
