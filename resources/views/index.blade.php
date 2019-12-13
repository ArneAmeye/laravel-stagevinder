@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/index.css') }}
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/distance.js') }}"></script>
@endsection
@section('content')
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
                Browse through the internships below by filtering on your interests or update your profile.
            @endslot
        @endcomponent
    @endif
    @if(!Auth::check())
        @component('components/info_kingtrainee')
        @endcomponent
    @endif
    @component('components/search')
	@endcomponent
    @auth
        @if(!empty(session('name')))
            @component('components/alert')
                @slot('type', 'info')
                <ul class="alert__container">
                    <li class="alert__item">
                        @if(basename(url()->previous()) == "register")
                            Welcome to King Trainee, {{ session('name') }}!
                        @else
                            Welcome back to King Trainee, {{ session('name') }}!
                        @endif
                    </li>
                </ul>
            @endcomponent
        @endif
    @endauth
    
            @if(Auth::check() and Session::has('user'))
                @if(Session::get('user')->type == 'student')
                    @if(isset($internships))
                        @component('components/show_my_applications', ['applications' => $applications])
                        @endcomponent
                        @component('components/show_internships', ['internships' => $internships])
                        @endcomponent
                    @endif
                @endif
                @if(Session::get('user')->type == 'company')
                    @component('components/show_applications_from_students', ['applications' => $applications])
                    @endcomponent
                    @component('components/show_my_company_internships', ['companyInternships' => $companyInternships])
                    @endcomponent
                @endif
            @else
                @if(isset($internships))
                    @component('components/show_internships', ['internships' => $internships])
                    @endcomponent
                @endif
            @endif  
		    </div>
		</section>
    </div>
@endsection

@if (\Session::has('error'))
    @component('components/alert')
        @slot('type', 'error')
            <ul class="alert__container">
                <li class="alert__item">{!! \Session::get('error') !!}</li>
            </ul>
    @endcomponent
@endif

@if (\Session::has('success'))
    @component('components/alert')
        @slot('type', 'success')
            <ul class="alert__container">
                <li class="alert__item">{!! \Session::get('success') !!}</li>
            </ul>
    @endcomponent
@endif