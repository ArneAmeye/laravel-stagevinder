@php
	use App\Helpers\Notification;

	if(!Session::has('user')){ 
		
	}else{
		if(Session::get('user')->type == 'student'){
			$profileLink = '/' .'students/' . Session::get('user')->id;
		}elseif(Session::get('user')->type == 'company'){
			$profileLink = '/'. 'companies/' . Session::get('user')->id;
		}
		$headerOfUser = [
			["name" => "Profile", "href" => $profileLink, "icon" => "fa-user"],
			["name" => "My Messages", "href" => "#", "icon" => "fa-envelope"],
			["name" => "Logout", "href" => "/logout", "icon" => "fa-sign-out-alt"]
		];
	}
	
@endphp
<header class="header__container">
	<div class="header__logo__inner">
		<a href="#" class="header__link">
			<i class="fas fa-bars header__menu__icon"></i>
		</a>
		<a href="/" class="header__logo">
			<img src="{{ asset('branding/logo.png') }}" class="header__logo__image">
		</a>
		@if(Auth::check())
			<a href="#" class="header__options header__options--mobile">
				<i class="fas fa-ellipsis-h header__options__icon" aria-hidden="true"></i>
			</a>
		@endif
	</div>
	<div class="header__options__container clearfix">
		<!--<ul class="header__options__items--left header__options__items--desktop">
			<form class="header__search" action ="/search" method="GET">
				{{ csrf_field() }}
				<input type="text" name="search" placeholder="Search" class="header__search--input header__options__search">
				<Button class="header__search--btn header__options__link">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
			</form>
		</ul>-->
		@if(Auth::check() and Session::has('user'))
			<ul class="header__options__items">
				<li class="header__options__item header__options__item--notifications">
					<a href="#" class="header__options__link">
						<i class="fas fa-bell header__options__icon" aria-hidden="true"></i>
						@if(Notification::newNotifications(Session::get('user')->id))
							<span class="header__options__badge header__options__badge--pink"></span>
						@endif
					</a>
					<ul class="notifications">
						@if(Notification::newNotifications(Session::get('user')->id))
							<li class="notification">
								<h6 class="notification__title">
									Notifications
								</h6>
								<label class="notification__label notification__label--red">New</label>
							</li>
							@foreach(Notification::getNotifications(Session::get('user')->id) as $notification)
								@php
									if(Session::get('user')->type == "company") {
										$id = $notification->student_id;
									} else {
										$id = $notification->company_id;
									}
									
									$data = Notification::getNotificationDetails($id);
								@endphp
								<li class="notification notification--{{ $notification->status }}">
									<img src="{{ asset('images/'.$data->image_location.'/profile_picture/'.$data->profile_picture) }}" class="notification__image">
									<div class="notification__body">
										<div class="clearfix">
											<h5 class="notification__user">
												@if(Session::get('user')->type == "company")
													{{ $data->firstname." ".$data->lastname }}
												@else
													{{ $data->name }}
												@endif
											</h5>
											<span class="notification__time">
												{{ $notification->updated_at->diffForHumans() }}
											</span>
										</div>
										<p class="notification__msg">
											@if(Session::get('user')->type == "company")
												{{ $data->firstname." ".$data->lastname." has send you a request!" }}
											@else
												@if($notification->status == 1)
													{{ $data->name." has accepted your request!" }}
												@elseif($notification->status == 2)
													{{ $data->name." has declined your request!" }}
												@endif
											@endif
										</p>
										@if(Session::get('user')->type == "company")
											<div class="notification__buttons">
												<a href="{{ route('internships.status', $notification->internship_id) }}?student={{ $data->id }}&status=accept" class="button button--accept">
													Accept
												</a>
												<a href="{{ route('internships.status', $notification->internship_id) }}?student={{ $data->id }}&status=decline" class="button button--decline">
													Decline
												</a>
											</div>
										@endif
									</div>
								</li>
							@endforeach
						@else
							<li class="notification">
								<h6 class="notification__title">
									Notifications
								</h6>
								<label class="notification__label notification__label--green">Up-to-date</label>
							</li>
							<li class="notification">
								<h4 class="notification__upToDate">
									You are up-to-date with your notifications!
								</h4>
							</li>
						@endif
					</ul>
				</li>
				<li class="header__options__item">
					<a href="#" class="header__options__link">
						<i class="fas fa-comments header__options__icon" aria-hidden="true"></i>
						<span class="header__options__badge header__options__badge--green"></span>
					</a>
				</li>
				<li class="header__options__item">
					<a href="#" class="header__options__link">
						@if (Session::get('user')->type == 'student')
							<img src="/images/students/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
						@elseif (Session::get('user')->type == 'company')
							<img src="/images/companies/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
						@endif
						<p class="header__options__name">
							@if (Session::get('user')->type == 'student')
								{{ Session::get('user')->firstname }} {{ Session::get('user')->lastname }}
							@elseif (Session::get('user')->type == 'company')
								{{ Session::get('user')->name }}
							@endif
						</p>
						<i class="fas fa-angle-down header__options__more" aria-hidden="true"></i>
					</a>
					<ul class="options__more__items">
						@foreach($headerOfUser as $item)
							<li class="options__more__item">
								<a href="{{$item['href']}}" class="options__more__link">
									<i class="fa {{$item['icon']}} options__more__icon" aria-hidden="true"></i>
									{{$item['name']}}
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			</ul>
		@endif
	</div>
</header>