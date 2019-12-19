@component('../components/not_authorized')
@endcomponent
<div class="preview__container">
    <h3 class="preview__container__title">All available internships:</h3>
    @component('../components/search')
    @endcomponent
    <!--Show empty state-->
    @if(count($internships) == 0)
        <p class="preview__container--empty-state">Oh no, no internships have been found! Add some tags to find your new match.</p>
    <!--Loop through all internships, if any.-->
    @else
        <div class="preview__container preview__container__items">
            @foreach($internships as $internship)
                @if($internship->is_available == 1)
                    @if(Auth::check() and Session::has('user'))
                        <a class="preview__flex__child" href="{{ url('/internships/') }}/{{ $internship->id }}">
                    @else
                        <a class="preview__flex__child" href="#">
                    @endif
                            <div class="preview__inner preview__inner--unauth">
                                <img class="preview__image" src="{{asset('images/internships/background_picture')}}/{{ $internship->background_picture}}">
                                <div class="preview__text">
                                    <p class="preview__text--internship">
                                        {{ $internship->title }}
                                    </p>
                                    <p class="preview__text--position">
                                        {{ $internship->description }}
                                    </p>
                                    @php
                                        $companyName = \App\Company::where('id', $internship->company_id)->first()->name;
                                    @endphp
                                    <p class="preview__text--company">
                                        @ {{ $companyName }}
                                    </p>
                                    <p class="preview__text--distance" data-id="{{ $internship->company_id }}">
                                    </p>
                                </div>
                            </div>
                        </a>
                @endif
            @endforeach
        </div>
    @endif
</div>