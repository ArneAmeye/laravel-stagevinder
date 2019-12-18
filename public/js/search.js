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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var btn = document.querySelector(".filter__btn");
var previewContainer = document.querySelector(".preview__container");
var params;

btn.onclick = function () {
  params = "";
  var design = document.querySelector(".filter__item__checkbox--design");

  if (design.checked === true) {
    params += "design&";
  }

  var development = document.querySelector(".filter__item__checkbox--development");

  if (development.checked === true) {
    params += "development&";
  }

  var webdesign = document.querySelector(".filter__item__checkbox--webdesign");

  if (webdesign.checked === true) {
    params += "webdesign&";
  }

  var webdevelopment = document.querySelector(".filter__item__checkbox--webdevelopment");

  if (webdevelopment.checked === true) {
    params += "webdevelopment&";
  }

  fetch("http://homestead.test/api/search?q=".concat(params), {
    method: "get"
  }).then(function (result) {
    return result.json();
  }).then(function (json) {
    var array = json;

    for (item in array) {
      var searchResults = "<a class=\"preview__flex__child\" href=\"/internships/".concat(array[item].company_id, "\">") + "<div class=\"preview__inner\">" + "<img class=\"preview__image\" src=\"images/internships/background_picture/".concat(array[item].background_picture, "\">") + "<div class=\"preview__text\">" + "<p class=\"preview__text--internship\">".concat(array[item].title, "</p>") + "<p class=\"preview__text--position\">".concat(array[item].description, "</p>") + "<p class=\"preview__text--company\">@company</p>" + "<p class=\"preview__text--distance\" data-id=\"".concat(array[item].company_id, "\"></p>") + "</div>" + "</div>" + "</a>";
      console.log(searchResults); //find a fix for company name
      //append in grid

      previewContainer.innerHTML = searchResults;
    }
  })["catch"](function (err) {
    console.log(err);
  });
};

/***/ }),

/***/ 6:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\haege\Dropbox\thomas_more\3IMD_A\advanced_webtech_back\laravel\projecten\laravel-stagevinder\resources\js\search.js */"./resources/js/search.js");


/***/ })

/******/ });