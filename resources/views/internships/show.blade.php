@extends("layouts/app")
	
@section('title')
    {{ $internship->name }}
@endsection
@section('stylesheet')
	{{ asset('css/pages/internship.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('title')
			{{$internship->name}}
		@endslot
		@slot('icon')
			fa-building
		@endslot
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
                    {{$internship->name}}
				</a>
			</li>
		@endslot
    @endcomponent
    <div class="page__container">
		<section class="internship__container">
			<div class="internship__inner internship__inner--padding">
			<div class="internship__inner__image" style="background-image: url({{$internship->background_picture}})"></div>


			</div>
		</section>
        
    </div>
@endsection
@section('script')
    {{ asset ('js/ajax.js') }}
@endsection

@if (\Session::has('success'))
	@component('components/alert')
		@slot('type', 'success')
			<ul class="alert__container">
				<li class="alert__item">{!! \Session::get('success') !!}</li>
			</ul>
	@endcomponent
@endif