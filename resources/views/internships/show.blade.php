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
				@slot('tags')
					{{$internship->tags}}
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
					$('.tags__selected').html( $('.tags__selected').html() + "<div class='tag__selected__container'> <p class='tag__selected'>" + tag + "</p></div>");

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
