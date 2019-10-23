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
        @if(!empty(session('name')))
            @component('components/alert')
                @slot('type', 'info')
                <ul class="alert__container">
                    <li class="alert__item">
                        Welcome back {{ session('name') }}!
                    </li>
                </ul>
            @endcomponent
        @endif
    @endauth
    <div class="preview__container">
        <section class="preview__container">
            @if(isset($internships))
                @component('components/show_internships', ['internships' => {{internships}}])
                @endcomponent
            @endif
		    </div>
		</section>
    </div>
@endsection