<form method="post" action="{{ route('company.update', $id) }}">
	{{ csrf_field() }}
    {{ method_field('patch') }}

    {{ $errors }}

	<div class="card__body card__body--padding clearfix">
		<div class="card__info">
			<table class="card__table">
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<input type="text" name="name" class="input" placeholder="Name" value="{{ $name }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<input type="text" name="sector" class="input" placeholder="Sector" value="{{ $sector }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-user-tie" aria-hidden="true"></i>
							</span>
							<input type="text" name="ceo" class="input" placeholder="Name CEO" value="{{ $ceo }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-map" aria-hidden="true"></i>
							</span>
							<input type="text" name="street" class="input" placeholder="Street" value="{{ $street }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
							</span>
							<input type="text" name="city" class="input" placeholder="city" value="{{ $city }}">
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
								<i class="fas fa-envelope" aria-hidden="true"></i>
							</span>
							<input type="email" name="email" class="input" placeholder="Email" value="{{ $email }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-phone" aria-hidden="true"></i>
							</span>
							<input type="text" name="number" class="input" placeholder="Mobile Number" value="{{ $number }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-user-alt" aria-hidden="true"></i>
							</span>
							<input type="text" name="manager" class="input" placeholder="Name manager" value="{{ $manager }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fab fa-linkedin" aria-hidden="true"></i>
							</span>
							<input type="text" name="linkedIn" class="input" placeholder="LinkedIn" value="{{ $linkedIn }}">
						</div>
					</td>
				</tr>
				<tr class="card__table__row">
					<td class="card__table__data">
						<div class="input__container">
							<span class="input__addon">
								<i class="fas fa-link" aria-hidden="true"></i>
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
		<a href="{{ url('companies/') }}/{{ $id }}" class="button button--transparent">Cancel</a>
	</div>
</form>