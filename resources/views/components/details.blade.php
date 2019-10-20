<div class="card__body card__body--padding clearfix">
	<div class="card__info">
		<table class="card__table">
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Full Name
				</th>
				<td class="card__table__data">
					{{ $name }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Profession
				</th>
				<td class="card__table__data">
					{{ $profession }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Birth Date
				</th>
				<td class="card__table__data">
					{{ $date }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					School
				</th>
				<td class="card__table__data">
					{{ $school }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Location
				</th>
				<td class="card__table__data">
					{{ $location }}
				</td>
			</tr>
		</table>
	</div>
	<div class="card__info">
		<table class="card__table">
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Email
				</th>
				<td class="card__table__data">
					{{ $email }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Mobile Number
				</th>
				<td class="card__table__data">
					{{ $number }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					LinkedIn
				</th>
				<td class="card__table__data">
					<a href="{{ $linkedIn }}" target="_blank">
						{{ $linkedIn }}
					</a>
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Skype
				</th>
				<td class="card__table__data">
					{{ $skype }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					website
				</th>
				<td class="card__table__data">
					<a href="{{ $website }}" target="_blank">	{{$website}}
					</a>
				</td>
			</tr>
		</table>
	</div>
</div>