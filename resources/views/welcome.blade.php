@extends('layouts/app')

@section('title')
    Home
@endsection
@section('stylesheet')
	{{ asset('css/pages/welcome.css') }}
@endsection
@section('script')
	{{ asset('js/search.js') }}
@endsection
@section('content')
	@component('components/search')
	@endcomponent
@endsection