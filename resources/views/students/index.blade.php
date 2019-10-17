@extends('layouts/app')

@section('title')
    Students
@endsection
@section('stylesheet')
	
@endsection

@section('content')
	<h1>Student List</h1>
	@foreach($students as $student)
		<a href="{{ url('/students/') }}/{{ $student->id }}">
			<p>
				{{ $student->firstname }}
			</p>
		</a>
	@endforeach
@endsection