<section class="card__container">
    <div class="card__inner">
        <div class="card__body card__body--padding clearfix">
            <div class="card__info">
                <div class="card__header">
                    <h5 class="card__title">Description</h5>
                    @if($current == $company_id)
						@if(empty($edit) || $edit != "details")
							<a href="?edit=details" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('internships/') }}/{{ $internship->id }}" class="button button--right">
								<i class="fas fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
                </div>
                <div class="card__body">
                        {{$description}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="card__container">
    <div class="card__inner">
        <div class="card__body card__body--padding clearfix">
            <div class="card__info">
                <div class="card__header">
                    <h5 class="card__title">Requirements</h5>
                    @if($current == $company_id)
						@if(empty($edit) || $edit != "details")
							<a href="?edit=details" class="button button--right">
								<i class="fas fa-edit" aria-hidden="true"></i>
							</a>
						@else
							<a href="{{ url('internships/') }}/{{ $internship->id }}" class="button button--right">
								<i class="fas fa-times" aria-hidden="true"></i>
							</a>
						@endif
					@endif
                </div>
                <div class="card__body">
                        {{$requirements}}
                        @if($requirements == "")
                        <p>No requirements set, try contacting the company for more information about desired skillsets.</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="card__container">
        <div class="card__inner">
            <div class="card__body card__body--padding clearfix">
                <div class="card__info">
                    <div class="card__header">
                        <h5 class="card__title">Tags</h5>
                        @if($current == $company_id)
                            @if(empty($edit) || $edit != "details")
                                <a href="?edit=details" class="button button--right">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>
                            @else
                                <a href="{{ url('internships/') }}/{{ $internship->id }}" class="button button--right">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                    <div class="card__body">
                        {{$tags}}
                    </div>
                </div>
            </div>
        </div>
    </section>