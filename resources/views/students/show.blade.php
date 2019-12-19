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
							<button class="button button--follow button--overImage">
								<i class="fas fa-plus button__icon" aria-hidden="true"></i>
								follow
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
						@slot('tags')
							{{ $student->tags }}
						@endslot
						@slot('current')
							{{ $current }}
						@endslot
						@slot('user_id')
							{{ $student->user_id }}
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
						@if(empty($student->bio) && $current == $student->user_id)
							<p class="card__text">You should add some bio or description so companies will accept you more easily.</p>
						@elseif(empty($student->bio))
							<p class="card__text">This student has not completed their description.</p>
						@else
						<p class="card__text">
							{{ $student->bio }}
						</p>
						@endif
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
						@if (empty($student->dribbble) && $current == $student->user_id)
							<p class="card__text">Edit me and sync with your Dribbble portfolio!</p>
						@elseif(empty($student->dribbble))
							<p class="card__text">This student has not connected their Dribbble portfolio.</p>
						@else
							<div class="dribbble__container">
							@forelse ($student->dribbble_api_result as $item)
							
								<a class="dribbble__item" href="{{ $item->html_url }}" target="_blank">
									<p class="dribbble__item__title">{{ $item->title }}</p>
									<img class="dribbble__item__img" src="{{ $item->images->teaser }}" alt="dribbble shot teaser image">
								</a>
								
							@empty
								<p class="card__text">Empty Dribble portfolio 😞. Try uploading your work to Dribbble!</p>
							@endforelse
							</div>
						@endif
						
					@else
						@component('components/edit_dribbble')
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
@section('script')
	<script type="text/javascript" src="{{ asset ('js/ajax.js') }}"></script>
	<script>
		$(document).ready(function(){
			var tagCount = 0;
			var tags = [];

			var selectedTags =	$('#tags').val();

			if(selectedTags !== "" ){
				var selectedTagsArray = selectedTags.split(" ");
				selectedTagsArray.forEach(function(tag, index){
					$('.tags__selected').html( $('.tags__selected').html() + " <div class='tag__selected__container'> <p class='tag__selected'>" + tag + "</p></div>");
					tags.push(tag);
					tagCount++
				})
			}

			getAutocomplete();

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
						$(".autocomplete__suggestions").html("");
						data.forEach(function(tag, index){
							$(".autocomplete__suggestions").append(
								"<p class='autocomplete__suggestion' data-id='tag-"+tag.name+"'>" + tag.name +"</p>"
							);

						});
						
					},
					error:function(e){
						console.log(e);
					}
					
				});
			}

			$(".autocomplete__suggestions").on('click', ".autocomplete__suggestion", function(){
				if(tagCount < 5){
					var tag = $(this).html();

					tagCount++;
					$('.autocomplete__suggestion[data-id="tag-'+tag+'"]').addClass('tagSelected');
					$('#tags').val($('#tags').val()+tag+ " ");
					$('.tags__selected').html( $('.tags__selected').html() + " <div class='tag__selected__container'> <p class='tag__selected'>" + tag + "</p></div>");

					tags.push(tag);

					getAutocomplete();
				}
			});

			$(".tags__selected").on('click', ".tag__selected__container", function(){
				
				var tag = $(this).children('.tag__selected')[0].innerHTML;
				tagCount--;
				$('.autocomplete__suggestion[data-id="tag-'+tag+'"]').removeClass('tagSelected');
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