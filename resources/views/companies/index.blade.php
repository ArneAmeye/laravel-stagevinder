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
                Companies
            @endslot
            @slot('icon')
                fa-building
            @endslot
            @slot('breadcrumb')
                <li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
                    <a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
                        Companies
                    </a>
                </li>
            @endslot
            @slot('sector')
                Find your company right now!
            @endslot
        @endcomponent
	@endif
	
	@if(isset($companies))
    	@component('components/show_companies', ['companies' => $companies])
    	@endcomponent
    @endif
	
@endsection
