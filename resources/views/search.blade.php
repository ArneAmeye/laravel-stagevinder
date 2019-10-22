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
	<div>
    <div><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

    <div>

        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            <h2>{{ ucfirst($type) }}</h2>

            @foreach($modelSearchResults as $searchResult)
                <ul>
                    <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                </ul>
            @endforeach
        @endforeach

    </div>
</div>
@endsection