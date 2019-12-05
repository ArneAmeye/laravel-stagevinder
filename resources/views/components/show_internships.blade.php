<div class="preview__container">
    <h3 class="preview__container__title">All available internships:</h3>
    @foreach($internships as $internship)
        @if($internship->is_available == 1)
            <a href="{{ url('/internships/') }}/{{ $internship->id }}">
                <div class="preview__inner">
                    <img class="preview__image" src="{{asset('images/internships/profile_picture')}}/{{ $internship->profile_picture }}">
                    <div class="preview__text">
                        <p class="preview__text--internship">
                            {{ $internship->title }}
                        </p>
                        <p class="preview__text--position">
                            {{ $internship->description }}
                        </p>
                    </div>
                </div>
            </a>
        @endif
    @endforeach
</div>