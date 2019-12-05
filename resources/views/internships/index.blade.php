@extends('layouts/app')

@section('title')
    Internships
@endsection
@section('stylesheet')
	{{ asset('css/pages/internship.css') }}
@endsection
@section('content')
	<!--Add component breadcrumbs-->
	@if(Auth::check() and Session::has('user'))
        @component('components/breadcrumb')
            @slot('title')
                Home
            @endslot
            @slot('icon')
                fa-home
            @endslot
            @slot('breadcrumb')
            @endslot
            @slot('sector')
            @endslot
        @endcomponent
	@endif
	
	@if(isset($internships))
    	@component('components/show_internships', ['internships' => $internships])
    	@endcomponent
    @endif
	
@endsection