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
		@slot('sector')
			{{$company->field_sector}}
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

		@if($current == $company->user_id)
			<section class="card__container card__container--menu">
				<ul class="card__menu__items">
					<li class="card__menu__item">
						<a href="{{ url('companies/') }}/{{ $company->id }}" class="card__menu__link {{ empty(app('request')->input('internship')) ? 'card__menu__link--current' : '' }}">
							Personal Info
						</a>
					</li>
					<li class="card__menu__item">
						<a href="?internship=list" class="card__menu__link {{ app('request')->input('internship') === 'list' ? 'card__menu__link--current' : '' }}">
							My Internships
						</a>
					</li>
					<li class="card__menu__item">
						<a href="?internship=create" class="card__menu__link {{ app('request')->input('internship') === 'create' ? 'card__menu__link--current' : '' }}">
							New Internship
						</a>
					</li>
					<li class="card__menu__item">
						<a href="#" class="card__menu__link">
							Misc
						</a>
					</li>
				</ul>
			</section>
		@endif


		@if(empty($internship))
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
			
		@elseif($internship == "list")
			<div class="preview__container">
				<section class="preview__container">
					@if(isset($internships))
						@foreach($internships as $internship)
							@if($internship->is_available == 1)
								<a href="{{ url('/internships/') }}/{{ $internship->id }}">
									<div class="preview__inner" style="background-image: url({{ asset('images/internships/background_picture/'.$internship->background_picture) }}); background-size: auto 100%; background-position: center;">
									<form method="post" action="{{route('internship.delete', $internship->id)}}">
										{{ csrf_field() }}
										{{ method_field('delete') }}
										<button type="submit" class="button button--danger button--right">
											<i class="fas fa-times" aria-hidden="true"></i>
										</button>
									</form>
										<img class="preview__image" src="">
										<div class="preview__text">
											<p class="preview__text--internship">
												{{ $internship->name }}
											</p>
											<p class="preview__text--position">
												{{ $internship->description }}
											</p>
										</div>
									</div>
								</a>
							@endif
						@endforeach
					@endif
					</div>
				</section>
			</div>

		@elseif($internship == "create")

		<form method="post" action="{{ route('internship.create', $company->id) }}">
				{{ csrf_field() }}
				{{ method_field('post') }}
			
				<section class="card__container">
					<div class="card__inner">
						<div class="card__header">
							<h5 class="card__title">
								File Upload
							</h5>	
						</div>
						<div class="card__body">
							<label>
								<input type="file" name="file" class="upload">
								<div class="upload__visual">
									<div class="upload__visual__icon">
										<i class="fas fa-cloud-upload-alt"></i>
									</div>
									<h3 class="upload__visual__text">
										Drag & Drop files here
									</h3>
									<span class="upload__visual__subtext">
										or
									</span>
									<a class="button button--margin">
										Browse Files
									</a>
								</div>
							</label>  
						</div>
					</div>
				</section>
			
				<section class="card__container">
					<div class="card__inner">
						<div class="card__header">
							<h5 class="card__title">
								Details
							</h5>	
						</div>
						<div class="card__body card__body--padding clearfix">
								<table class="card__table">
									<tr class="card__table__row">
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-id-card" aria-hidden="true"></i>
												</span>
												<input type="text" name="title" class="input" placeholder="Title" value="">
											</div>
										</td>
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-briefcase" aria-hidden="true"></i>
												</span>
												<input type="text" name="sector" class="input" placeholder="Sector" value="">
											</div>
										</td>
									</tr>
									<tr class="card__table__row">
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-file-alt" aria-hidden="true"></i>
												</span>
												<textarea name="description" class="input" placeholder="Job Description" value=""></textarea>
											</div>
										</td>
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-list-ul" aria-hidden="true"></i>
												</span>
												<textarea name="requirements" class="input" placeholder="Job Requirements" value=""></textarea>
											</div>
										</td>
									</tr>
								</table>
						</div>
					</div>
				</section>
				<div class="button__center">
					<button type="submit" class="button button--margin" name="create_internship">Create</button>
				</div>
				
			</form>
		@endif

		<section class="card__container">
			<div class="card__inner">
				@component('components/google_maps')
					@slot('adress', $company->street_and_number." ".$company->zip_code." ".$company->city);
				@endcomponent
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
    <script type="text/javascript" src="{{ asset ('js/ajax.js') }}"></script>
@endsection