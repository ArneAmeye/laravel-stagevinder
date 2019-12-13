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
                Internships
            @endslot
            @slot('icon')
                fa-file-alt
            @endslot
            @slot('breadcrumb')
                <li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
                    <a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
                        Internships
                    </a>
                </li>
            @endslot
            @slot('sector')
                Don't know what internship you wan't to do? Just look around!
            @endslot
        @endcomponent
	@endif
	
	@if(isset($internships))
    	@component('components/show_internships', ['internships' => $internships])
    	@endcomponent
    @endif
	
@endsection