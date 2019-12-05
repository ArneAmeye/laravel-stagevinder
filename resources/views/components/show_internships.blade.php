<div class="preview__container">
    <h3 class="preview__container__title">All available internships:</h3>
    @foreach($internships as $internship)
        @if($internship->is_available == 1)
            @if(Auth::check() and Session::has('user'))
                <a href="{{ url('/internships/') }}/{{ $internship->id }}">
            @else
                <a href="/login">
            @endif
                    <div class="preview__inner">
                        <img class="preview__image" src="{{asset('images/internships/background_picture')}}/{{ $internship->background_picture}}">
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