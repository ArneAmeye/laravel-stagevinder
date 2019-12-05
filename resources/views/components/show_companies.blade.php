<div class="preview__container">
        <h3 class="preview__container__title">All registered companies:</h3>
        @foreach($companies as $company)
                @if(Auth::check() and Session::has('user'))
                    <a href="{{ url('/companies/') }}/{{ $company->id }}">
                @else
                    <a href="/login">
                @endif
                        <div class="single__company__card">
                            <img class="single__company__card__photo" src="{{asset('images/companies/profile_picture')}}/{{ $company->profile_picture}}">
                            <div class="single__company__card__text">
                                <p class="single__company__card__text--name">
                                    {{ $company->name }}
                                </p>

                                @php
                                    $totalInternships = \App\Internship::where('company_id', $company->id)->count();
                                @endphp
                                <p class="single__company__card__text--internships">
                                    {{ $totalInternships }} internships
                                </p>
                            </div>
                        </div>
                    </a>
        @endforeach
    </div>