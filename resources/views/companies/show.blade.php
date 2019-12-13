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
				<a href="/Companies" class="breadcrumb__info__link">
                    Companies
				</a>
			</li>
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
						@if($current != $company->user_id)
							<div class="buttons__container">
								<button class="button button--follow button--overImage">
									<i class="fa fa-plus button__icon" aria-hidden="true"></i>
									follow
								</button>
							</div>
						@endif
					</div>
				</div>
			</div>
		</section>

		<section class="card__container card__container--menu">
			<ul class="card__menu__items">
				<li class="card__menu__item">
					<a href="{{ url('companies/') }}/{{ $company->id }}" class="card__menu__link {{ empty(app('request')->input('internship')) ? 'card__menu__link--current' : '' }}">
						Companies Info
					</a>
				</li>
				<li class="card__menu__item">
					<a href="?internship=list" class="card__menu__link {{ app('request')->input('internship') === 'list' ? 'card__menu__link--current' : '' }}">
						{{ $current == $company->user_id ? 'My Internships' : 'Companies Internships' }}
					</a>
				</li>
				@if($current == $company->user_id)
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
				@endif
			</ul>
		</section>


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
							Description
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
				<section class="preview__container">
					@if(count($internships) == 0)
						<p class="preview__container--empty-state">Expand your kingdom and create a new internship!</p>
					@else
						@foreach($internships as $internship)
							@if($internship->is_available == 1)
								<a href="{{ url('/internships/') }}/{{ $internship->id }}">
									<div class="preview__inner">
										@if($current == $company->user_id)
											<form method="post" action="{{route('internship.delete', $internship->id)}}" class="preview__form">
												{{ csrf_field() }}
												{{ method_field('delete') }}
												<button type="submit" class="button button--danger button--right">
													<i class="fas fa-times" aria-hidden="true"></i>
												</button>
											</form>
										@endif
										<img class="preview__image" src="{{ asset('images/internships/background_picture/'.$internship->background_picture) }}">
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
						<p class="required__info">Fields with a <span class="required__field">*</span> are required.</p>
						<div class="card__body card__body--padding clearfix">
								<table class="card__table">
									<tr class="card__table__row">
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-id-card" aria-hidden="true"></i>
													<p class="required__field">*</p>
												</span>
												<input required type="text" name="title" class="input" placeholder="Title" value="">
											</div>
										</td>
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-briefcase" aria-hidden="true"></i>
													<p class="required__field">*</p>
												</span>
												<input required type="text" name="sector" class="input" placeholder="Sector" value="">
											</div>
										</td>
									</tr>
									<tr class="card__table__row">
										<td class="card__table__data">
											<div class="input__container">
												<span class="input__addon">
													<i class="fas fa-file-alt" aria-hidden="true"></i>
													<p class="required__field">*</p>
												</span>
												<textarea required name="description" class="input" placeholder="Job Description" value=""></textarea>
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
									@component('components/tags')
										
									@endcomponent
								</table>
						</div>
					</div>
				</section>
				<div class="button__center">
					<button type="submit" class="button button--margin" name="create_internship">Create</button>
				</div>
				
			</form>
		@endif
		@if(!$internship == "list")
			<section class="card__container">
				<div class="card__inner">
					@component('components/google_maps')
						@slot('adress', $company->street_and_number." ".$company->zip_code." ".$company->city);
					@endcomponent
				</div>
			</section>
		@endif
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
	<!--<script type="text/javascript" src="{{ asset ('js/getTags.js') }}"></script>-->
	<script>
		$(document).ready(function(){
			var tagCount = 0;
			var tags = [];
			$('#tag__autocomplete').keyup(function(){
					
				getAutocomplete();

				
			});

			function getAutocomplete(){

				$.ajax({
					type:"POST",
					url:'/getTags',
					data:{
						'msg' : $('#tag__autocomplete').val(),
						'tags': tags
					},
					dataType: "json",
					success:function(data){
						if(Array.isArray(data) == false){
							data = Object.values(data);
						}
						console.log(data);
						$(".autocomplete-suggestions").html("");
						data.forEach(function(tag, index){
							$(".autocomplete-suggestions").append(
								"<p class='autocomplete-suggestion' data-id='tag-"+tag.name+"'>" + tag.name +"</p>"
							);

						});
						
					},
					error:function(e){
						console.log(e);
					}
					
				});
			}

			$(".autocomplete-suggestions").on('click', ".autocomplete-suggestion", function(){
				if(tagCount < 5){
					var tag = $(this).html();

					tagCount++;
					$('.autocomplete-suggestion[data-id="tag-'+tag+'"]').addClass('tagSelected');
					$('#tags').val($('#tags').val()+tag+ " ");
					$('.tags__selected').html( $('.tags__selected').html() + " <div class='selected-tag-container'> <p class='selected-tag'>" + tag + "</p> <span class='delete-tag'>X</span> </div>");

					tags.push(tag);

					getAutocomplete();
				}
			});

			$(".tags__selected").on('click', ".selected-tag-container", function(){
				
				var tag = $(this).children('.selected-tag')[0].innerHTML;
				tagCount--;
				$('.autocomplete-suggestion[data-id="tag-'+tag+'"]').removeClass('tagSelected');
				var oldVal = $('#tags').val();
				var oldValSplit = oldVal.replace(tag, '');
				$('#tags').val(oldValSplit);
				$(this).remove();
				var index = tags.indexOf(tag);
				if (index > -1) {
					tags.splice(index, 1);
				}

				getAutocomplete();
			});

		});
	</script>
@endsection