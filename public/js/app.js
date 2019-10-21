/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  /* NAVIGATION OPEN AND CLOSE */
  var toggleMore = true;
  $(".header__options__more, .header__options__name").click(function (e) {
    if (toggleMore) {
      $(".options__more__items").show(200);
      $(".options__more__items").addClass("options__more__items--active");
      toggleMore = false;
    } else {
      $(".options__more__items").hide(200);
      $(".options__more__items").removeClass("options__more__items--active");
      toggleMore = true;
    }

    e.stopPropagation();
  });
  $(document).click(function (e) {
    if ($(e.target).is(".options__more__items," + ".options__more__item," + ".options__more__link," + ".options__more__icon") === false) {
      $(".options__more__items").hide(200);
      $(".options__more__items").removeClass("options__more__items--active");
    }
  });
  var toggleOptions = true;
  $(".header__options__icon").click(function (e) {
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

  $(".header__link").click(function (e) {
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

  $(".alert__close").click(function () {
    $(".alert").removeClass("alert--show");
    $(".alert").addClass("alert--hide");
  });
  setTimeout(function () {
    $(".alert").removeClass("alert--show");
    $(".alert").addClass("alert--hide");
  }, 6000);
  /*TOGGLE SLIDER REGISTER*/

  $(".slider__container").click(function () {
    //Input fields form
    $(".container--active, .container--disabled").toggleClass("container--active container--disabled");
    $(".container--disabled input").attr("value", "empty");
    $(".container--active input").attr("value", ""); //Checkbox value

    var CheckBox = $("input[name=isStudent]");
    CheckBox.prop("checked", !CheckBox.prop("checked")); //Container slider

    $(".slider__container--disabled, .slider__container--active").toggleClass("slider__container--disabled slider__container--active"); //Circle in slider

    $(".slider__item--disabled, .slider__item--active").toggleClass("slider__item--disabled slider__item--active"); //Text next to slider

    $(".slider__item--label").html($(".slider__item--label").html() == "You are a student!" ? "You are a company!" : "You are a student!");
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/authentication.scss":
/*!********************************************!*\
  !*** ./resources/sass/authentication.scss ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/company.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/company.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/index.scss":
/*!*****************************************!*\
  !*** ./resources/sass/pages/index.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/internship.scss":
/*!**********************************************!*\
  !*** ./resources/sass/pages/internship.scss ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/login.scss":
/*!*****************************************!*\
  !*** ./resources/sass/pages/login.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/privacy.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/privacy.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/register.scss":
/*!********************************************!*\
  !*** ./resources/sass/pages/register.scss ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/student.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/student.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/upload.scss":
/*!******************************************!*\
  !*** ./resources/sass/pages/upload.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/authentication.scss ./resources/sass/pages/index.scss ./resources/sass/pages/student.scss ./resources/sass/pages/company.scss ./resources/sass/pages/internship.scss ./resources/sass/pages/login.scss ./resources/sass/pages/upload.scss ./resources/sass/pages/register.scss ./resources/sass/pages/privacy.scss ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\app.scss */"./resources/sass/app.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\authentication.scss */"./resources/sass/authentication.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\index.scss */"./resources/sass/pages/index.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\student.scss */"./resources/sass/pages/student.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\company.scss */"./resources/sass/pages/company.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\internship.scss */"./resources/sass/pages/internship.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\login.scss */"./resources/sass/pages/login.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\upload.scss */"./resources/sass/pages/upload.scss");
__webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\register.scss */"./resources/sass/pages/register.scss");
module.exports = __webpack_require__(/*! d:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\sass\pages\privacy.scss */"./resources/sass/pages/privacy.scss");


/***/ })

/******/ });