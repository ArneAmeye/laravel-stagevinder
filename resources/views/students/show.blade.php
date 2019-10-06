@extends("layouts/app")

@section('title')
    {{$student->firstname}}
@endsection
@section('stylesheet')
	{{ asset('css/pages/student.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
					User Profile
				</a>
			</li>
		@endslot
	@endcomponent
@endsection
@section('javascript')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection