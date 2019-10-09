@extends('layouts/app')

@section('title')
    Add Company
@endsection
@section('stylesheet')
	{{ asset('css/pages/index.css') }}
@endsection
@section('content')
    @component('components/breadcrumb')
        @slot('icon')
			fa-plus
		@endslot
		@slot('breadcrumb')
		@endslot
	@endcomponent
    <div class="preview__container">
       <h1>API Result:</h1>
       <p>{{ dd($body) }}</p>
    </div>
@endsection