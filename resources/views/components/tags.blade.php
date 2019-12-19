<section class="card__container">
    <div>
        <div class="card__header">
            <h5 class="card__title">
                Tags
            </h5>
        </div>
        <div class="card__body">
            <div class="card__text">
                <div class="input__container">
                    <span class="input__addon">
                        <i class="fas fa-tags" aria-hidden="true"></i>
                    </span>
                <input class="input input--tag" placeholder="Tags" value="" id="tag__autocomplete"/>
                </div>
            </div>
            <div class="card__info">  
                <table class="card__table">
                    <tr class="card__table__row">
                        <td class="card__table__data">
                            <input type="hidden" name="tags" value="{{$tags}}" id="tags">
                            <div class="input__container autocomplete__suggestions">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="tags__arrow">
                >
            </div>

            <div class="card__info">
                <table class="card__table">
                    <tr class="card__table__row">
                        <td class="card__table__data">
                            <div class="input__container tags__selected">
                                
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>