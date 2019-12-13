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
			@if($sector != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Sector
				</th>
				<td class="card__table__data">
					{{ $sector }}
				</td>
			</tr>
			@endif
			@if($ceo != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					CEO
				</th>
				<td class="card__table__data">
					{{ $ceo }}
				</td>
			</tr>
			@endif
			@if($street != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Street
				</th>
				<td class="card__table__data">
					{{ $street }}
				</td>
			</tr>
			@endif
			@if($city != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					City
				</th>
				<td class="card__table__data">
					{{ $city }}
				</td>
			</tr>
			@endif
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
			@if($number != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Mobile Number
				</th>
				<td class="card__table__data">
					{{ $number }}
				</td>
			</tr>
			@endif
			@if($manager != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Manager
				</th>
				<td class="card__table__data">
					{{ $manager }}
				</td>
			</tr>
			@endif
			@if($linkedIn != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					LinkedIn
				</th>
				<td class="card__table__data">
					<a href="{{ $linkedIn }}">{{$linkedIn}}</a>
				</td>
			</tr>
			@endif
			@if($website != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Website
				</th>
				<td class="card__table__data">
					<a href="{{ $website }}" target="_blank">{{$website}}</a>
				</td>
			</tr>
			@endif
		</table>
	</div>
</div>