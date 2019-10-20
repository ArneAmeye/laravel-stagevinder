@extends("layouts/app")
	
@section('title')
    {{ $company->name }}
@endsection
@section('stylesheet')
	{{ asset('css/pages/company.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('title')
			{{$company->name}}
		@endslot
		@slot('icon')
			fa-building
		@endslot
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
					{{$company->name}}
				</a>
			</li>
		@endslot
	@endcomponent
<div class="page__container">
		<section class="user__container">
			<div class="user__inner user__inner--padding">
				<div class="user__inner__image" style="background-image: url({{ asset('images/companies/background_picture/'.$company->background_picture) }});">
					@if($current == $company->user_id)
						<a href="/upload?edit=background&q=companies" class="button button--right button--hidden">
							<i class="fas fa-edit" aria-hidden="true"></i>
						</a>
					@endif
				</div>
				<div class="user__info">
					<div class="user__inner clearfix">
						<div class="user__profile">
							@if($current == $company->user_id)
								<a href="/upload?edit=profile&q=companies" class="button button--right button--hidden">
									<i class="fas fa-edit" aria-hidden="true"></i>
								</a>
							@endif
							<a href="{{ asset('images/companies/profile_picture/'.$company->profile_picture) }}" target="_blank">
								<div class="user__profile__image" style="background-image: url({{ asset('images/companies/profile_picture/'.$company->profile_picture) }});">
									
								</div>
							</a>
						</div>
						<div class="user__inner user__inner--inline">
							<div class="user__details">
								<h2 class="user__name">
									{{ $company->name }}
								</h2>
								<span class="user__function">
									{{ $company->field_sector }}
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
					@if($current == $company->user_id)
						@if(empty($edit) || $edit != "details")
							<a href="?edit=details" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('companies/') }}/{{ $company->id }}" class="button button--right">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
				</div>
				@if(empty($edit) || $edit != "details")
					@component('components/details_company')
				@else
					@component('components/edit_details_company')
				@endif
						@slot('name') 
							{{ $company->name }}
						@endslot
						@slot('sector') 
							{{ $company->field_sector }}
						@endslot
						@slot('street') 
							{{ $company->street_and_number }}
						@endslot
						@slot('ceo') 
							{{ $company->CEO_firstname }} {{ $company->CEO_lastname}}
						@endslot
						@slot('city') 
							{{ $company->city }}
						@endslot
						@slot('postal') 
							{{ $company->zip_code }}
						@endslot
						@slot('email') 
							{{ $user->email }}
						@endslot
						@slot('number') 
							{{ $company->mobile_number }}
						@endslot
						@slot('linkedIn') 
							{{ $company->linkedIn }}
						@endslot
						@slot('manager') 
							{{ $company->manager_firstname }} {{ $company->manager_lastname }}
						@endslot
						@slot('website')
							{{ $company->website }}
						@endslot
						@slot('id')
							{{ $company->id }}
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
					@if($current == $company->user_id)
						@if (empty($edit) || $edit != "bio")
							<a href="?edit=bio" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('companies/') }}/{{ $company->id }}" class="button button--right">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
				</div>
				<div class="card__body">
					@if (empty($edit) || $edit != "bio")
						<p class="card__text">
							{{ $company->bio }}
						</p>
					@else
						@component('components/edit_bio_company')
							@slot('bio')
								{{ $company->bio }}
							@endslot
							@slot('id')
								{{ $company->id }}
							@endslot
						@endcomponent
					@endif
				</div>
			</div>
		</section>
	</div>

	@if (\Session::has('success'))
		@component('components/alert')
			@slot('type', 'success')
				<ul class="alert__container">
					<li class="alert__item">{!! \Session::get('success') !!}</li>
				</ul>
		@endcomponent
	@endif
@endsection
@section('script')
    {{ asset ('js/ajax.js') }}
@endsection