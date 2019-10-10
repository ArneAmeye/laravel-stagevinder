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

<form method="post" action="{{ route('student.update', $id) }}">
	{{ csrf_field() }}
    {{ method_field('patch') }}

	<div class="card__body card__body--padding clearfix">
		<div class="card__info">
			<table class="card__table">
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<input type="text" name="username" class="input" placeholder="Full Name" value="{{ $name }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<input type="text" name="profession" class="input" placeholder="Profession" value="{{ $profession }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
							<input type="date" name="date" class="input" placeholder="Birth Date" value="{{ $date }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
							<input type="text" name="school" class="input" placeholder="School" value="{{ $school }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
							<input type="text" name="location" class="input" placeholder="Location" value="{{ $location }}">
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="card__info">
			<table class="card__table">
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
							<input type="email" name="email" class="input" placeholder="Email" value="{{ $email }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</span>
							<input type="text" name="number" class="input" placeholder="Mobile Number" value="{{ $number }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</span>
							<input type="text" name="linkedIn" class="input" placeholder="LinkedIn" value="{{ $linkedIn }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-skype" aria-hidden="true"></i>
							</span>
							<input type="text" name="skype" class="input" placeholder="Skype" value="{{ $skype }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-link" aria-hidden="true"></i>
							</span>
							<input type="text" name="website" class="input" placeholder="Website" value="{{ $website }}">
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="button__center button__center--margin">
		<button type="submit" class="button button--big" name="update">Save</button>
		<a href="{{ url('students/') }}/{{ $id }}" class="button button--transparent">Cancel</a>
	</div>
</form>