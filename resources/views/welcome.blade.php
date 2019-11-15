@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/welcome.css') }}
@endsection
@section('script')
	{{ asset('js/search.js') }}
@endsection
@section('content')
	@component('components/search')
	@endcomponent
    <div class="preview__container">
        <section class="preview__container">
            @component('components/preview')
            @endcomponent
            <!--@if(!isset($search))
                @component('components/search')
                @endcomponent
            @endif-->
		    </div>
		</section>
    </div>
@endsection