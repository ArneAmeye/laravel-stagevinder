<div class="preview__container">
        <h3 class="preview__container__title">Your Company Internships:</h3>
        @php
            $companyId = Session::get('user')->id;   
        @endphp
        <a class="preview__button--add" href="{{ url('/companies/') }}/{{ $companyId }}?internship=create"><button class="button">
            <i class="fa fa-plus button__icon"></i>
            Add Internship
        </button></a>

        @foreach($companyInternships as $myInternship)
            @if($myInternship->is_available == 1)
                <a class="preview__container--link" href="{{ url('/internships/') }}/{{ $myInternship->id }}">
                    <div class="preview__inner">
                        <img class="preview__image" src="{{asset('images/internships/background_picture')}}/{{ $myInternship->background_picture }}">
                        <div class="preview__text">
                            <p class="preview__text--internship">
                                {{ $myInternship->title }}
                            </p>
                            <p class="preview__text--position">
                                {{ $myInternship->description }}
                            </p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
</div>
