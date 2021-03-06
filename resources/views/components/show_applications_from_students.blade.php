<div class="applications__container">
    @php
        $totalApplications = 0;
        foreach($applications as $appl){
            if($appl->status == 0){
                $totalApplications++;
            }
        }
        $applicationWord = ($totalApplications === 1) ? "application" : "applications";
    @endphp
    <h3 class="preview__container__title">You have {{ $totalApplications }} student {{ $applicationWord }} waiting:</h3>
    @if(count($applications) == 0)
        <p class="preview__container--empty-state">No applications found. Add some new or update the info on an internship.</p>
    @else
        @foreach($applications as $application)
            @if($application->status == 0) 
                @php
                    $student = \App\Student::where('id', $application->student_id)->first();
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
                            $status = "application____internship__status--denied";
                            $status['text'] = "declined";
                            break;
                    }
                @endphp
                <div class="preview__flex__child">
                    <div class="application__single__container">
                        <a href="{{ url('/students/') }}/{{ $application->student_id }}">
                            <div class="application__student__profile {{$status['class']}}">
                                <img class="student__image" src="{{asset('images/students/profile_picture')}}/{{ $student->profile_picture }}" alt="student profile picture">
                                    <div class="student__text">
                                        <p class="student__name">
                                            {{ $student->firstname }} {{ $student->lastname }}
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
                        <!--accept/decline buttons-->
                        <div class="application__internship__notification__buttons">
                            <a href="{{ url('/internships/') }}/{{ $application->internship_id }}/status?student={{ $application->student_id }}&status=accept" class="button button--accept">
                                Accept
                            </a>
                            <a href="{{ url('/internships/') }}/{{ $application->internship_id }}/status?student={{ $application->student_id }}&status=decline" class="button button--decline">
                                Decline
                            </a>
                        </div>
                    </div>
                </div>
            @endif 
        @endforeach
    @endif
</div>