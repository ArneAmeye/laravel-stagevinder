@extends('layouts/app')

@section('title')
    Internships
@endsection
@section('stylesheet')
	{{ asset('css/pages/internship.css') }}
@endsection
@section('content')
	<!--Add component breadcrumbs-->
	@if(isset($internships))
    	@component('components/show_internships', ['internships' => $internships])
    	@endcomponent
    @endif
	
@endsection