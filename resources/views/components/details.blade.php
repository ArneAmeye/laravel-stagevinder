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
			@if($profession != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Profession
				</th>
				<td class="card__table__data">
					{{ $profession }}
				</td>
			</tr>
			@endif
			@if($date != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Birth Date
				</th>
				<td class="card__table__data">
					{{ $date }}
				</td>
			</tr>
			@endif
			@if($school != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					School
				</th>
				<td class="card__table__data">
					{{ $school }}
				</td>
			</tr>
			@endif
			@if($location != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Location
				</th>
				<td class="card__table__data">
					{{ $location }}
				</td>
			</tr>
			@endif
			@if($tags != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Tags
				</th>
				<td class="card__table__data">
					{{ $tags }}
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
			@if($linkedIn != "" || $current == $user_id)
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
			@endif
			@if($skype != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					Skype
				</th>
				<td class="card__table__data">
					{{ $skype }}
				</td>
			</tr>
			@endif
			@if($website != "" || $current == $user_id)
			<tr class="card__table__row">
				<th class="card__table__data card__table__data--big">
					website
				</th>
				<td class="card__table__data">
					<a href="{{ $website }}" target="_blank">	{{$website}}
					</a>
				</td>
			</tr>
			@endif
		</table>
	</div>
</div>