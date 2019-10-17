@extends("layouts/app")

@section('title')
    Upload
@endsection
@section('stylesheet')
	{{ asset('css/pages/upload.css') }}
@endsection
@section('content')
	@component('components/breadcrumb')
		@slot('title')
			Upload
		@endslot
		@slot('icon')
			fa-upload
		@endslot
		@slot('breadcrumb')
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="/students/{{ Session::get('user')->id }}" class="breadcrumb__info__link">
					User Profile
				</a>
			</li>
			<li class="breadcrumb__info__linkContainer breadcrumb__info__linkContainer--slash">
				<a href="#!" class="breadcrumb__info__link breadcrumb__info__link--current">
					Upload
				</a>
			</li>
		@endslot
	@endcomponent

	<section class="card__container">
		<div class="card__inner">
			<div class="card__header">
				<h5 class="card__title">
					File Upload
				</h5>	
			</div>
			<div class="card__body">
				<form method="get" action="">
					<label>
						<input type="file" name="files[]" class="upload">
						<div class="upload__visual">
							<div class="upload__visual__icon">
								<i class="fas fa-cloud-upload-alt"></i>
							</div>
							<h3 class="upload__visual__text">
								Drag & Drop files here
							</h3>
							<span class="upload__visual__subtext">
								or
							</span>
							<a type="submit" class="button button--margin">
								Browse Files
							</a>
						</div>
					</label>
				</form>
			</div>
		</div>
	</section>
@endsection