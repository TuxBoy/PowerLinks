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

/***/ "./assets/css/app.scss":
/*!*****************************!*\
  !*** ./assets/css/app.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/js/Link.ts":
/*!***************************!*\
  !*** ./assets/js/Link.ts ***!
  \***************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils/api */ "./assets/js/utils/api.ts");

class Link {
    constructor(element) {
        this.element = element;
        this.addFormLink = document.querySelector('#addFormLink');
        this.urlInput = document.querySelector('#addFormLink #urlInput');
    }
    showFormWithKey(event) {
        if (this.addFormLink === null)
            return;
        if (event.key === 't' && this.addFormLink.classList.contains('hide')) {
            event.preventDefault();
            this.addFormLink.classList.toggle('hide');
            if (!this.urlInput)
                return;
            this.urlInput.focus();
        }
        else if (event.key === 'Escape') {
            this.addFormLink.classList.toggle('hide');
        }
    }
    init() {
        if (this.element) {
            this.element.addEventListener('click', (event) => {
                event.preventDefault();
                if (!this.addFormLink)
                    return;
                this.addFormLink.classList.toggle('hide');
            });
            document.addEventListener('keydown', this.showFormWithKey.bind(this));
        }
    }
    change() {
        if (this.urlInput) {
            const routePath = document.querySelector('.routeAjax').value;
            this.urlInput.addEventListener('change', (event) => {
                const url = event.target.value;
                Object(_utils_api__WEBPACK_IMPORTED_MODULE_0__["post"])('/link/metas', { url: url }).then((response) => {
                    console.log(response);
                });
            });
        }
    }
}
/* harmony default export */ __webpack_exports__["default"] = (Link);


/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/app.scss */ "./assets/css/app.scss");
/* harmony import */ var _css_app_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_app_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Link__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Link */ "./assets/js/Link.ts");


var showFormAddLink = document.querySelector('#showFormAddLink');
var link = new _Link__WEBPACK_IMPORTED_MODULE_1__["default"](showFormAddLink);
link.init();
link.change();

/***/ }),

/***/ "./assets/js/utils/api.ts":
/*!********************************!*\
  !*** ./assets/js/utils/api.ts ***!
  \********************************/
/*! exports provided: post */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "post", function() { return post; });
class APIError {
    constructor(errors) {
        this.errors = errors;
    }
}
async function post(url, data) {
    // @ts-ignore
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
    const status = response.status;
    const result = await response.json();
    if (status >= 200 && status < 300) {
        return result;
    }
    else {
        throw new APIError(result);
    }
}


/***/ }),

/***/ 0:
/*!******************************************************!*\
  !*** multi ./assets/js/app.js ./assets/css/app.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\benoi\Documents\Projets\PowerLinks\assets\js\app.js */"./assets/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\benoi\Documents\Projets\PowerLinks\assets\css\app.scss */"./assets/css/app.scss");


/***/ })

/******/ });