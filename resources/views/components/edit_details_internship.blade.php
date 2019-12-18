@if($errors->any())
	@component('components/alert')
		@slot('type', 'error')
		<ul class="alert__container">
			@foreach($errors->all() as $error)
				<li class="alert__item">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endcomponent
@endif



	<section class="card__container">
		<div class="card__inner">
			<div class="card__header">
				<h5 class="card__title">
					Details
				</h5>	
			</div>
			
			<p class="required__info">Fields with a <span class="required__field">*</span> are required.</p>
			<form method="post" action="{{ route('internship.update', $id) }}">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<div class="card__body card__body--padding clearfix">
						<table class="card__table">
							<tr class="card__table__row">
								<td class="card__table__data">
									<div class="input__container">
										<span class="input__addon">
											<i class="fas fa-id-card" aria-hidden="true"></i>
											<p class="required__field">*</p>
										</span>
									<input required type="text" name="title" class="input" placeholder="Title" value="{{$title}}">
									</div>
								</td>
								<td class="card__table__data">
									<div class="input__container">
										<span class="input__addon">
											<i class="fas fa-briefcase" aria-hidden="true"></i>
											<p class="required__field">*</p>
										</span>
									<input required type="text" name="sector" class="input" placeholder="Sector" value="{{$sector}}">
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
									<textarea required name="description" class="input textarea" placeholder="Job Description">{{$description}}</textarea>
									</div>
								</td>
								<td class="card__table__data">
									<div class="input__container">
										<span class="input__addon">
											<i class="fas fa-list-ul" aria-hidden="true"></i>
											<p class="required__field">*</p>
										</span>
									<textarea required name="requirements" class="input textarea" placeholder="Job Requirements">{{$requirements}}</textarea>
									</div>
								</td>
							</tr>
						</table>
				</div>
				@component('components/tags')
					
				@endcomponent

				<div class="button__center">
					<button type="submit" class="button button--margin" name="update_internship">update</button>
				</div>
			</form>
		</div>
	</section>
	