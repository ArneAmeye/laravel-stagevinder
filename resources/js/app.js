$(document).ready(function() {
    /* NAVIGATION OPEN AND CLOSE */
    var toggleMore = true;
    $(".header__options__more, .header__options__name").click(function(e) {
        if (toggleMore) {
            $(".options__more__items").show(200);
            $(".options__more__items").addClass("options__more__items--active");
            toggleMore = false;
        } else {
            $(".options__more__items").hide(200);
            $(".options__more__items").removeClass(
                "options__more__items--active"
            );
            toggleMore = true;
        }
        e.stopPropagation();
    });

    $(document).click(function(e) {
        if (
            $(e.target).is(
                ".options__more__items," +
                    ".options__more__item," +
                    ".options__more__link," +
                    ".options__more__icon"
            ) === false
        ) {
            $(".options__more__items").hide(200);
            $(".options__more__items").removeClass(
                "options__more__items--active"
            );
        }
    });

    var toggleOptions = true;
    $(".header__options__icon").click(function(e) {
        var width = $(window).width();
        if (width <= 993) {
            if (toggleOptions) {
                $(".header__options__container").show(300);
                toggleOptions = false;
            } else {
                $(".header__options__container").hide(300);
                toggleOptions = true;
            }
        }
        e.stopPropagation();
        e.preventDefault();
    });

    var width = $(window).width();
    if (width >= 993) {
        var toggleNavigation = true;
    } else {
        var toggleNavigation = false;
    }
    $(".header__link").click(function(e) {
        if (toggleNavigation) {
            $(".navigation__container").animate({
                marginLeft: "-270px"
            });
            toggleNavigation = false;
        } else {
            $(".navigation__container").animate({
                marginLeft: "0"
            });
            toggleNavigation = true;
        }
        e.preventDefault();
    });

    /* ERRORS SHOW AND HIDE */
    $(".alert__close").click(function() {
        $(".alert").removeClass("alert--show");
        $(".alert").addClass("alert--hide");
    });

    setTimeout(function() {
        $(".alert").removeClass("alert--show");
        $(".alert").addClass("alert--hide");
    }, 6000);

    /*TOGGLE SLIDER REGISTER*/
    $(".slider__container").click(function() {
        //Input fields form
        $(".container--active, .container--disabled").toggleClass(
            "container--active container--disabled"
        );

        //Checkbox value
        let CheckBox = $("input[name=isStudent]");
        CheckBox.prop("checked", !CheckBox.prop("checked"));

        //Container slider
        $(
            ".slider__container--disabled, .slider__container--active"
        ).toggleClass("slider__container--disabled slider__container--active");

        //Circle in slider
        $(".slider__item--disabled, .slider__item--active").toggleClass(
            "slider__item--disabled slider__item--active"
        );

        //Text next to slider
        $(".slider__item--label").html(
            $(".slider__item--label").html() == "You are a student!"
                ? "You are a company!"
                : "You are a student!"
        );
    });
});
