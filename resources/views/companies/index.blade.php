@extends('layouts/app')

@section('title')
    Companies
@endsection
@section('stylesheet')
	{{ asset('css/pages/companies.css') }}
@endsection
@section('content')
	<!--Add component breadcrumbs-->
	<h1>Company List</h1>
	@foreach($companies as $company)
	<a href="{{ url('companies/') }}/{{ $company->id }}">
		<p>
			{{ $company->name }}
		</p>
	</a>
	@endforeach
	
@endsection
