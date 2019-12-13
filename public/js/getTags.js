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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/getTags.js":
/*!*********************************!*\
  !*** ./resources/js/getTags.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var tagCount = 0;
  var tags = [];
  $('#tag__autocomplete').keyup(function () {
    getAutocomplete();
  });

  function getAutocomplete() {
    $.ajax({
      type: "POST",
      url: '/getTags',
      data: {
        'msg': $('#tag__autocomplete').val(),
        'tags': tags
      },
      dataType: "json",
      success: function success(data) {
        if (Array.isArray(data) == false) {
          data = Object.values(data);
        }

        console.log(data);
        $(".autocomplete-suggestions").html("");
        data.forEach(function (tag, index) {
          $(".autocomplete-suggestions").append("<p class='autocomplete-suggestion' data-id='tag-" + tag.name + "'>" + tag.name + "</p>");
        });
      },
      error: function error(e) {
        console.log(e);
      }
    });
  }

  $(".autocomplete-suggestions").on('click', ".autocomplete-suggestion", function () {
    if (tagCount < 5) {
      var tag = $(this).html();
      tagCount++;
      $('.autocomplete-suggestion[data-id="tag-' + tag + '"]').addClass('tagSelected');
      $('#tags').val($('#tags').val() + tag + " ");
      $('.tags__selected').html($('.tags__selected').html() + " <div class='selected-tag-container'> <p class='selected-tag'>" + tag + "</p> <span class='delete-tag'>X</span> </div>");
      tags.push(tag);
      getAutocomplete();
    }
  });
  $(".tags__selected").on('click', ".selected-tag-container", function () {
    var tag = $(this).children('.selected-tag')[0].innerHTML;
    tagCount--;
    $('.autocomplete-suggestion[data-id="tag-' + tag + '"]').removeClass('tagSelected');
    var oldVal = $('#tags').val();
    var oldValSplit = oldVal.replace(tag, '');
    $('#tags').val(oldValSplit);
    $(this).remove();
    var index = tags.indexOf(tag);

    if (index > -1) {
      tags.splice(index, 1);
    }

    getAutocomplete();
  });
});

/***/ }),

/***/ 3:
/*!***************************************!*\
  !*** multi ./resources/js/getTags.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< HEAD
module.exports = __webpack_require__(/*! C:\Users\haege\Dropbox\thomas_more\3IMD_A\advanced_webtech_back\laravel\projecten\laravel-stagevinder\resources\js\getTags.js */"./resources/js/getTags.js");
=======
module.exports = __webpack_require__(/*! D:\Bureaublad\Thomas More\Sem 5\Webtech Advanced Back\PHP2\laravel-app\resources\js\getTags.js */"./resources/js/getTags.js");
>>>>>>> a57067f6f8f1ffe8e06d0452b1363a9a3369fb3b


/***/ })

/******/ });