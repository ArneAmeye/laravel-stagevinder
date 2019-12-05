<div class="applications__container">
        <h3 class="preview__container__title">You have student applications waiting:</h3>
        @foreach($applications as $application)
                
                @php
                    $student = \App\Student::where('id', $application->student_id)->first();
                    $internship = \App\Internship::where('id', $application->internship_id)->first();
                @endphp

                <div class="application__single__container">
                    <a href="{{ url('/students/') }}/{{ $application->student_id }}">
                        <div class="application__student__profile">
                        <img class="student__image" src="{{asset('images/students/profile_picture')}}/{{ $student->profile_picture }}" alt="student profile picture">
                            <p class="student__name">
                                {{ $student->firstname }} {{ $student->lastname }}
                            </p>
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
                
        @endforeach
</div>
