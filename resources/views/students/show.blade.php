@extends("layouts/app")

@section('content')
	@component('components/alert')
		@slot('type') danger @endslot
	    Woops, something went wrong
	@endcomponent

	<h1>Student</h1>
	<p>{{$student->id}}</p>
@endsection