@extends('template')

@section('link')

	<link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">

@endsection

@section('content')

	<div class="welcome center blue-grey lighten-5">
		<p> Welcome :D </p>
	</div>

	<a href="{{ url('list') }}" class="waves-effect waves-light btn right button"><i class="mdi-file-cloud left"></i> Lists </a>

@endsection
