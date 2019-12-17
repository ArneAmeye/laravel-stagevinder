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
		@slot('sector')
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
				<form method="post" action="{{ route('upload.one') }}" enctype="multipart/form-data" id="upload">
					{{ csrf_field() }}
    				{{ method_field('patch') }}

    				<input type="hidden" name="edit" value="{{ app('request')->input('edit') }}">
					<input type="hidden" name="q" value="{{ app('request')->input('q') }}">
					<input type="hidden" name="id" value="{{ app('request')->input('id') }}">
					<div class="upload__container">
						<input type="file" name="file" class="upload" id="input__upload">
						<div class="upload__visual">
							<div id="upload__preview"></div>
							<div class="upload__visual__icon">
								<i class="fas fa-cloud-upload-alt"></i>
							</div>
							<h3 class="upload__visual__text">
								Drag & Drop files here
							</h3>
							<span class="upload__visual__subtext">
								or
							</span>
							<a class="button button--margin">
								Browse Files
							</a>
						</div>
					</div>
					<div class="button__center">
						<button type="submit" class="button button--margin button--big button--hidden" id="button_upload">
							Upload
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<section class="card__container" id="preview__card">
		<div class="card__inner">
			<div class="card__header">
				<h5 class="card__title">
					Preview
				</h5>	
			</div>
			<div class="card__body card__body--transparent">
				<div class="card__body__preview" id="preview">
				</div>
			</div>
		</div>
	</section>

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
@endsection
@section('script')
	<script type="text/javascript" src="{{ asset ('js/upload.js') }}"></script>
@endsection