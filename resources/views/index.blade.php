@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/index.css') }}
@endsection
@section('content')
    @component('components/breadcrumb')
        @slot('title')
            Home
        @endslot
        @slot('icon')
			fa-home
		@endslot
		@slot('breadcrumb')
		@endslot
	@endcomponent
    @auth
        @if(!empty(session('full_name')))
            @component('components/alert')
                @slot('type', 'info')
                <ul class="alert__container">
                    <li class="alert__item">
                        Welcome back {{ session('full_name') }}!
                    </li>
                </ul>
            @endcomponent
        @endif
    @endauth
    <div class="preview__container">
        <section class="preview__container">
            @foreach($internships as $internship)
                @if($internship->is_available == 1)
                    <a href="{{ url('/internships/') }}/{{ $internship->id }}">
                        <div class="preview__inner">
                            <img class="preview__image" src="https://via.placeholder.com/500">
                            <div class="preview__text">
                                <p class="preview__text--internship">
                                    {{ $internship->name }}
                                </p>
                                <p class="preview__text--position">
                                    {{ $internship->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
		    </div>
		</section>
    </div>
@endsection