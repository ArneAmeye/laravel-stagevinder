@extends('layouts/app')

@section('title')
    Companies
@endsection
@section('stylesheet')
	{{ asset('css/pages/company.css') }}
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
	
	@if(isset($companies))
    	@component('components/show_companies', ['companies' => $companies])
    	@endcomponent
    @endif
	
@endsection
