@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/student.css') }}
@endsection
@section('content')
    @component('components/breadcrumb')
		@slot('breadcrumb')
		@endslot
	@endcomponent
    <div class="preview__container">
        <section class="preview__container">
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
		    </div>
		</section>
    </div>
@endsection