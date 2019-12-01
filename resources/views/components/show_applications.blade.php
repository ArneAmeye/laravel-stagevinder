<h3 class="preview__container__title">Your Company Internships:</h3>
@foreach($companyInternships as $myInternship)
    @if($myInternship->is_available == 1)
	    <a href="{{ url('/internships/') }}/{{ $myInternship->id }}">
            <div class="preview__inner">
                <img class="preview__image" src="https://picsum.photos/500/500">
                <div class="preview__text">
                    <p class="preview__text--internship">
                        {{ $myInternship->name }}
                    </p>
    	            <p class="preview__text--position">
                        {{ $myInternship->description }}
                    </p>
                </div>
            </div>
        </a>
	@endif
@endforeach