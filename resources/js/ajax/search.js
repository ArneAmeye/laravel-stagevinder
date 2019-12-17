document.querySelector(".filter__btn").onclick(() => {
    let design = document.querySelector(".filter__item__checkbox--design")
        .value;
    let development = document.querySelector(
        ".filter__item__checkbox--development"
    ).value;
    let webdevelopment = document.querySelector(
        ".filter__item__checkbox--webdevelopment"
    ).value;
    let webdesign = document.querySelector(".filter__item__checkbox--webdesign")
        .value;

    let params = `${design}&${development}&${webdevelopment}&${webdesign}`;

    fetch(`http://homestead.test/api/search?q=${params}`, {
        method: "get"
    })
        .then(result => {
            return result.json();
        })
        .then(json => {
            console.log(json);
        })
        .catch(err => {
            console.log(err);
        });
});
