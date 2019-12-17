@extends("layouts/app")
	
@section('title')
    {{ $internship->title }}
@endsection
@section('stylesheet')
	{{ asset('css/pages/internship.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('title')
			{{$internship->title}}
		@endslot
		@slot('icon')
			fa-file-alt
		@endslot
		@slot('sector')
			{{$internship->field_sector}}
		@endslot
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="/internships" class="breadcrumb__info__link">
                    Internships
				</a>
			</li>
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
                    {{$internship->title}}
				</a>
			</li>
		@endslot
    @endcomponent
    <div class="page__container">
			<section class="user__container">
					<div class="user__inner user__inner--padding">
						<div class="user__inner__image" style="background-image: url({{ asset('images/internships/background_picture/'.$internship->background_picture) }});">
							@if($current == $company->user_id)
									<a href="/upload?edit=background&q=internships&id={{$internship->id}}" class="button button--right">
										<i class="fas fa-edit" aria-hidden="true"></i>
									</a>
							@endif
						</div>
						<div class="user__info">
							<div class="user__inner clearfix">
								<div class="user__profile">
								<a href="/companies/{{$company->id}}">
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
								@if($applied)
									<div class="buttons__container">
										<a href="{{ route('internships.removeApply', $internship->id) }}" class="button button--green button--overImage">
											<i class="fas fa-briefcase button__icon" aria-hidden="true"></i>
											<span>Applied</span>
										</a>
									</div>
								@elseif(Session::get('user')->type == 'student')
									<div class="buttons__container">
										<a href="{{ route('internships.apply', $internship->id) }}" class="button button--overImage">
											<i class="fas fa-briefcase button__icon" aria-hidden="true"></i>
											Apply
										</a>
									</div>
								@endif
							</div>
						</div>
					</div>
				</section>

		<section class="internship__container">
		@if(empty($edit) || $edit != "details")
			@component('components/details_internship')
		@else
			@component('components/edit_details_internship')
		@endif
				@slot("title")
					{{$internship->title}}
				@endslot
				@slot("sector")
					{{$internship->field_sector}}
				@endslot
				@slot("description")
					{{$internship->description}}
				@endslot
				@slot("requirements")
					{{$internship->requirements}}
				@endslot
				@slot('id')
					{{$internship->id}}
				@endslot
				@slot('current')
					{{$current}}
				@endslot
				@slot('company_id')
					{{$company->user_id}}
				@endslot
			@endcomponent
		</section> 
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset ('js/ajax.js') }}"></script>
	<script type="text/javascript" src="{{ asset ('js/remove_button.js') }}"></script>
	<script type="text/javascript" src="{{ asset ('js/getTags.js') }}"></script>
	<script type="text/javascript" src="{{ asset ('js/upload.js') }}"></script>
@endsection

@if (\Session::has('success'))
	@component('components/alert')
		@slot('type', 'success')
			<ul class="alert__container">
				<li class="alert__item">{!! \Session::get('success') !!}</li>
			</ul>
	@endcomponent
@endif

@if (\Session::has('error'))
	@component('components/alert')
		@slot('type', 'error')
			<ul class="alert__container">
				<li class="alert__item">{!! \Session::get('error') !!}</li>
			</ul>
	@endcomponent
@endif
