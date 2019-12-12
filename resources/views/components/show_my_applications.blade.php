<div class="applications__container">
        <h3 class="preview__container__title">Your current applications:</h3>
        @foreach($applications as $application)
                
                @php
                    $company = \App\Company::where('id', $application->company_id)->first();
                    $internship = \App\Internship::where('id', $application->internship_id)->first();
                    switch ($application->status) {
                        case 0:
                            $status['class'] = "application____internship__status--waiting";
                            $status['text'] = "waiting";
                            break;
                        case 1:
                            $status['class'] = "application____internship__status--accepted";
                            $status['text'] = "accepted";
                            break;
                        case 2:
                            $status['class'] = "application____internship__status--denied";
                            $status['text'] = "declined";
                            break;
                    }
                @endphp

                <div class="preview__flex__child">
                    <div class="application__single__container ">
                        <a href="{{ url('/companies/') }}/{{ $application->company_id }}">
                            <div class="application__student__profile {{$status['class']}}">
                            <img class="student__image" src="{{asset('images/companies/profile_picture')}}/{{ $company->profile_picture }}" alt="company profile picture">
                            <div class="student__text">
                                <p class="student__name">
                                    {{ $company->name }}
                                </p>
                                <p class="student__status">{{$status['text']}}</p>
                            </div>    
                            
                            </div>
                        </a>

                        <img class="application__internship__photo" src="{{asset('images/internships/background_picture')}}/{{ $internship->background_picture }}" alt="internship picture">

                        <a href="{{ url('/internships/') }}/{{ $application->internship_id }}">
                        <div class="application__internship__preview">
                                <div class="application____internship__text">
                                <p class="application____internship__text--title">
                                    {{ $internship->title }}
                                </p>
                                <p class="application____internship__text--description">
                                    {{ $internship->description }}
                                </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
        @endforeach
</div>
