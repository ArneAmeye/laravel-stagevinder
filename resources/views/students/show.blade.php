@extends("layouts/app")
	
@section('title')
    {{ $student->firstname }}
@endsection
@section('stylesheet')
	{{ asset('css/pages/student.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('icon')
			fa-user
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
				<img src="http://html.codedthemes.com/guru-able/files/assets/images/user-profile/bg-img1.jpg">
				<div class="user__info">
					<div class="user__inner clearfix">
						<div class="user__profile">
							<a href="http://html.codedthemes.com/guru-able/files/assets/images/user-profile/user-img.jpg">
								<img src="http://html.codedthemes.com/guru-able/files/assets/images/user-profile/user-img.jpg" class="user__profile__image">
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
								<i class="fa fa-plus button__icon" aria-hidden="true"></i>
								follow
							</button>
							<button class="button">
								<i class="fa fa-comment button__icon" aria-hidden="true"></i>
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
					@if(empty($edit) || $edit != "details")
						<a href="?edit=details" class="button button--right">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					@else
						<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--right">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
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
							{{ $student->email }}
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
					@if (empty($edit) || $edit != "bio")
						<a href="?edit=bio" class="button button--right">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					@else
						<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--right">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>
					@endif
				</div>
				<div class="card__body">
					@if (empty($edit) || $edit != "bio")
						<p class="card__text">
							{{ $student->bio }}
						</p>
					@else
						<textarea class="textarea">{{ $student->bio }}</textarea>
						<div class="button__center">
							<button class="button button--big">Save</button>
							<a href="{{ url('students/') }}/{{ $student->id }}" class="button button--transparent">Cancel</a>
						</div>
					@endif
				</div>
			</div>
		</section>
	</div>
@endsection

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif