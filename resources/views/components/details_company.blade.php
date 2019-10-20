<div class="card__body card__body--padding clearfix">
	<div class="card__info">
		<table class="card__table">
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Name
				</th>
				<td class="card__table__data">
					{{ $name }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Sector
				</th>
				<td class="card__table__data">
					{{ $sector }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					CEO
				</th>
				<td class="card__table__data">
					{{ $ceo }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Street
				</th>
				<td class="card__table__data">
					{{ $street }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					City
				</th>
				<td class="card__table__data">
					{{ $city }}
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
					Manager
				</th>
				<td class="card__table__data">
					{{ $manager }}
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					LinkedIn
				</th>
				<td class="card__table__data">
					<a href="{{ $linkedIn }}">{{$linkedIn}}</a>
				</td>
			</tr>
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Website
				</th>
				<td class="card__table__data">
					<a href="{{ $website }}" target="_blank">{{$website}}</a>
				</td>
			</tr>
		</table>
	</div>
</div>