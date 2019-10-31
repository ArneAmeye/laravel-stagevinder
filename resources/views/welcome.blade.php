@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/welcome.css') }}
@endsection
@section('content')
	@component('components/search')
	@endcomponent
    <div class="preview__container">
        <section class="preview__container">
            @if(isset($internships))
                @component('components/show_internships', ['internships' => $internships])
                @endcomponent
            @endif
            <!--@if(!isset($search))
                @component('components/search')
                @endcomponent
            @endif-->  
		    </div>
		</section>
    </div>
@endsection