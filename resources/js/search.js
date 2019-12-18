let btn = document.querySelector(".filter__btn");
let previewContainer = document.querySelector(".preview__container__items");
let searchResults;

let params;
btn.onclick = () => {
    params = "";
    searchResults = "";
    previewContainer.innerHTML = "";

    let design = document.querySelector(".filter__item__checkbox--design");

    if (design.checked === true) {
        params += "design&";
    }

    let development = document.querySelector(
        ".filter__item__checkbox--development"
    );

    if (development.checked === true) {
        params += "development&";
    }

    let webdesign = document.querySelector(
        ".filter__item__checkbox--webdesign"
    );

    if (webdesign.checked === true) {
        params += "webdesign&";
    }

    let webdevelopment = document.querySelector(
        ".filter__item__checkbox--webdevelopment"
    );

    if (webdevelopment.checked === true) {
        params += "webdevelopment&";
    }

    fetch(`{{env('SITE_URL')}}=${params}`, {
        method: "get"
    })
        .then(result => {
            return result.json();
        })
        .then(json => {
            let array = json;

            for (item in array) {
                searchResults +=
                    `<a class="preview__flex__child" href="/internships/${array[item].company_id}">` +
                    `<div class="preview__inner">` +
                    `<img class="preview__image" src="images/internships/background_picture/${array[item].background_picture}">` +
                    `<div class="preview__text">` +
                    `<p class="preview__text--internship">${array[item].title}</p>` +
                    `<p class="preview__text--position">${array[item].description}</p>` +
                    //`<p class="preview__text--company">@company</p>` +
                    `<p class="preview__text--distance" data-id="${array[item].company_id}"></p>` +
                    `</div>` +
                    `</div>` +
                    `</a>`;
                //append in grid
                previewContainer.innerHTML = searchResults;
            }
        })
        .catch(err => {
            console.log(err);
        });
};