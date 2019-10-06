@extends("layouts/app")

@section('title')
    {{$student->firstname}}
@endsection
@section('stylesheet')
	{{ asset('css/pages/student.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
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
				<img src="http://html.codedthemes.com/guru-able/files/assets/images/user-profile/bg-img1.jpg">
				<div class="user__info">
					<div class="user__inner clearfix">
						<div class="user__profile">
							<a href="#">
								<img src="http://html.codedthemes.com/guru-able/files/assets/images/user-profile/user-img.jpg" class="user__profile__image">
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
							<button class="button">
								<i class="fa fa-plus button__icon" aria-hidden="true"></i>
								follow
							</button>
							<button class="button">
								<i class="fa fa-comment button__icon" aria-hidden="true"></i>
								message
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
					<button class="button button--right">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</button>
				</div>
				<div class="card__body card__body--padding clearfix">
					<div class="card__info">
						<table class="card__table">
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Full Name
								</th>
								<td class="card__table__data">
									{{ $student->firstname }} {{ $student->lastname }}
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Gender
								</th>
								<td class="card__table__data">
									Female
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Birth Date
								</th>
								<td class="card__table__data">
									October 25th, 1990
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									School
								</th>
								<td class="card__table__data">
									{{ $student->school }}
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Location
								</th>
								<td class="card__table__data">
									New York, USA
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
									{{ $student->email }}
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Mobile Number
								</th>
								<td class="card__table__data">
									(0123) - 4567891
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Twitter
								</th>
								<td class="card__table__data">
									@xyz
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									Skype
								</th>
								<td class="card__table__data">
									demo.skype
								</td>
							</tr>
							<tr class="card__table__row">
								<th class="card__table__data card__table__data--big">
									website
								</th>
								<td class="card__table__data">
									www.demo.com
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</section>

		<section class="card__container">
			<div class="card__inner">
				<div class="card__header">
					<h5 class="card__title">
						Description About Me
					</h5>
					<button class="button button--right">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</button>
				</div>
				<div class="card__body">
					<p class="card__text">
						{{ $student->bio }}
					</p>
				</div>
			</div>
		</section>
	</div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection