<!DOCTYPE html>
<html>
	<head>
		
		<title>Test</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="access logs">
		<meta name="description" content="Show informaions about entering company.">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
	</head>

	<body>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
		<a href="{{ url('cards/click') }}">Click me</a>
		<!-- Code Here -->
		<form method="post" action="{{ url('cards/test') }}">
		
			<input name="file" type="file" class="file" data-show-preview="false">
			<button class = "submit">Submit</button>
                    	
		</form>
	</body>
</html>

<!--
@extends('app')

@section('content')

	<div class="container-fluid">Cards</div>
	<hr/>

	@foreach ($cards as $card)

		<card>
			<h2> {{ $card->id }} : {{ $card->name }} </h2>

		</card>

	@endforeach
			
@endsection
-->
