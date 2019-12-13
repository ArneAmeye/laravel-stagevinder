<section class="card__container">
    <div class="card__inner">
        <div class="card__body card__body--padding clearfix">
            <div class="card__info">
                <div class="card__header">
                    <h5 class="card__title">Description</h5>
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