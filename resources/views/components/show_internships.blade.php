@foreach($internships as $internship)
    @if($internship->is_available == 1)
	    <a href="{{ url('/internships/') }}/{{ $internship->id }}">
            <div class="preview__inner">
                <img class="preview__image" src="https://via.placeholder.com/500">
                <div class="preview__text">
                    <p class="preview__text--internship">
                        {{ $internship->name }}
                    </p>
    	            <p class="preview__text--position">
                        {{ $internship->description }}
                    </p>
                </div>
            </div>
        </a>
	@endif
@endforeach