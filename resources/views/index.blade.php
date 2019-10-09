@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/index.css') }}
@endsection
@section('content')
    @component('components/breadcrumb')
		@slot('breadcrumb')
		@endslot
	@endcomponent
    <div class="preview__container">
        <section class="preview__container">
            @foreach($internships as $internship)
	            <a href="">
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
            @endforeach
            <!--
            <div class="preview__inner">
                <div class="preview__header">
                    <h5 class="preview__title">
                        Name internship
                    </h5>
			    </div>
                <div class="preview__body">
                    <p class="preview__text">
                        Proffesion
                    </p>
                </div>
            -->
		    </div>
		</section>
    </div>
@endsection