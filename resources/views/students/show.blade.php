@extends("layouts/app")
	
@section('title')
    {{ $student->firstname }} {{ $student->lastname }}
@endsection
@section('stylesheet')
	{{ asset('css/pages/student.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('title')
			{{ $student->firstname }} {{ $student->lastname }}
		@endslot
		@slot('icon')
			fa-graduation-cap
		@endslot
		@slot('sector')
			{{$student->field_study}}
		@endslot
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
					User Profile
				</a>
			</li>
		@endslot
	@endcomponent
	<div class="page__container">
		<section class="user__container">
			<div class="user__inner user__inner--padding">
				<div class="user__inner__image" style="background-image: url({{ asset('images/students/background_picture/'.$student->background_picture) }});">
					@if($current == $student->user_id)
						<a href="/upload?edit=background&q=students" class="button button--right button--hidden">
							<i class="fas fa-edit" aria-hidden="true"></i>
						</a>
					@endif
				</div>
				<div class="user__info">
					<div class="user__inner clearfix">
						<div class="user__profile">
							@if($current == $student->user_id)
								<a href="/upload?edit=profile&q=students" class="button button--right button--hidden">
									<i class="fas fa-edit" aria-hidden="true"></i>
								</a>
							@endif
							<a href="{{ asset('images/students/profile_picture/'.$student->profile_picture) }}" target="_blank">
								<div class="user__profile__image" style="background-image: url({{ asset('images/students/profile_picture/'.$student->profile_picture) }});">
									
								</div>
							</a>
						</div>
						<div class="user__inner user__inner--inline">
							<div class="user__details">
								<h2 class="user__name">
									{{ $student->firstname }} {{ $student->lastname }}
								</h2>
								<span class="user__function">
									{{ $student->field_study }}
								</span>
							</div>
						</div>
						<div class="buttons__container">
							<button class="button">
								<i class="fas fa-plus button__icon" aria-hidden="true"></i>
								follow
							</button>
							<button class="button">
								<i class="fas fa-comment button__icon" aria-hidden="true"></i>
								message
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="card__container">
			<div class="card__inner">
				<div class="card__header">
					<h5 class="card__title">
						About Me
					</h5>
					@if($current == $student->user_id)
						@if(empty($edit) || $edit != "details")
							<a href="?edit=details" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--right">
								<i class="fas fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
				</div>
				@if(empty($edit) || $edit != "details")
					@component('components/details')
				@else
					@component('components/edit_details')
				@endif
						@slot('name') 
							{{ $student->firstname }} {{ $student->lastname }}
						@endslot
						@slot('profession') 
							{{ $student->field_study }}
						@endslot
						@slot('date') 
							{{ $student->birth_date }}
						@endslot
						@slot('school') 
							{{ $student->school }}
						@endslot
						@slot('location') 
							{{ $student->adress }}
						@endslot
						@slot('email') 
							{{ $student->user['email'] }}
						@endslot
						@slot('number') 
							{{ $student->mobile_number }}
						@endslot
						@slot('linkedIn') 
							{{ $student->linkedIn }}
						@endslot
						@slot('skype') 
							{{ $student->skype }}
						@endslot
						@slot('website')
							{{ $student->website }}
						@endslot
						@slot('id')
							{{ $student->id }}
						@endslot
					@endcomponent
			</div>
		</section>

		<section class="card__container">
			<div class="card__inner">
				<div class="card__header">
					<h5 class="card__title">
						Description About Me
					</h5>
					@if($current == $student->user_id)
						@if (empty($edit) || $edit != "bio")
							<a href="?edit=bio" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--right">
								<i class="fas fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
				</div>
				<div class="card__body">
					@if (empty($edit) || $edit != "bio")
						<p class="card__text">
							{{ $student->bio }}
						</p>
					@else
						@component('components/edit_bio')
							@slot('bio')
								{{ $student->bio }}
							@endslot
							@slot('id')
								{{ $student->id }}
							@endslot
						@endcomponent
					@endif
				</div>
			</div>
		</section>

		<section class="card__container">
			<div class="card__inner">
				<div class="card__header">
					<h5 class="card__title">
						Dribbble portfolio
					</h5>
					@if($current == $student->user_id)
						@if (empty($edit) || $edit != "dribbble")
							<a href="?edit=dribbble" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--right">
								<i class="fas fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
				</div>
				<div class="card__body">
					@if (empty($edit) || $edit != "dribbble")
						<p class="card__text">
							*TODO* show Dribbble portfolio items here.
						</p>
					@else
						@component('components/edit_dribbble')
							@slot('dribbbleUsername')
								{{ $student->dribbble }}
							@endslot
							@slot('id')
								{{ $student->id }}
							@endslot
						@endcomponent
					@endif
				</div>
			</div>
		</section>

	</div>
@endsection

@if (\Session::has('success'))
    @component('components/alert')
		@slot('type', 'success')
		<ul class="alert__container">
			<li class="alert__item">
				{!! \Session::get('success') !!}
			</li>
		</ul>
	@endcomponent
@endif