@extends('layouts/app')

@section('title')
    Internships
@endsection
@section('stylesheet')
	{{ asset('css/pages/internships.css') }}
@endsection
@section('content')
	<!--Add component breadcrumbs-->
	<h1>Internship List</h1>
	@foreach($internships as $internship)
	<a href="{{ url('internships/') }}/{{ $internship->id }}">
		<p>
			{{ $internship->title }}
		</p>
	</a>
	@endforeach
	
@endsection