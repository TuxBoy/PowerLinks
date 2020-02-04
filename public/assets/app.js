(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.scss":
/*!*****************************!*\
  !*** ./assets/css/app.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

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

const showFormAddLink = document.querySelector('#showFormAddLink');

if (showFormAddLink) {
  showFormAddLink.addEventListener('click', event => {
    document.querySelector('#addFormLink').classList.toggle('hide');
  });
  document.addEventListener('keydown', event => {
    if (event.key === 't') {
      //event.preventDefault()
      document.querySelector('#addFormLink').classList.toggle('hide');
      const urlInput = document.querySelector('#addFormLink #urlInput');
      urlInput.focus();
    }
  });
}

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsic2hvd0Zvcm1BZGRMaW5rIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwia2V5IiwidXJsSW5wdXQiLCJmb2N1cyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsdUM7Ozs7Ozs7Ozs7OztBQ0FBO0FBQUE7QUFBQTtBQUFBO0FBRUEsTUFBTUEsZUFBZSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsa0JBQXZCLENBQXhCOztBQUVBLElBQUlGLGVBQUosRUFBcUI7QUFDakJBLGlCQUFlLENBQUNHLGdCQUFoQixDQUFpQyxPQUFqQyxFQUEwQ0MsS0FBSyxJQUFJO0FBQy9DSCxZQUFRLENBQUNDLGFBQVQsQ0FBdUIsY0FBdkIsRUFBdUNHLFNBQXZDLENBQWlEQyxNQUFqRCxDQUF3RCxNQUF4RDtBQUNILEdBRkQ7QUFHQUwsVUFBUSxDQUFDRSxnQkFBVCxDQUEwQixTQUExQixFQUFxQ0MsS0FBSyxJQUFJO0FBQzFDLFFBQUlBLEtBQUssQ0FBQ0csR0FBTixLQUFjLEdBQWxCLEVBQXVCO0FBQ25CO0FBQ0FOLGNBQVEsQ0FBQ0MsYUFBVCxDQUF1QixjQUF2QixFQUF1Q0csU0FBdkMsQ0FBaURDLE1BQWpELENBQXdELE1BQXhEO0FBQ0EsWUFBTUUsUUFBUSxHQUFHUCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsd0JBQXZCLENBQWpCO0FBQ0FNLGNBQVEsQ0FBQ0MsS0FBVDtBQUNIO0FBQ0osR0FQRDtBQVFILEMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiaW1wb3J0ICcuLi9jc3MvYXBwLnNjc3MnXHJcblxyXG5jb25zdCBzaG93Rm9ybUFkZExpbmsgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjc2hvd0Zvcm1BZGRMaW5rJylcclxuXHJcbmlmIChzaG93Rm9ybUFkZExpbmspIHtcclxuICAgIHNob3dGb3JtQWRkTGluay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGV2ZW50ID0+IHtcclxuICAgICAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjYWRkRm9ybUxpbmsnKS5jbGFzc0xpc3QudG9nZ2xlKCdoaWRlJylcclxuICAgIH0pXHJcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdrZXlkb3duJywgZXZlbnQgPT4ge1xyXG4gICAgICAgIGlmIChldmVudC5rZXkgPT09ICd0Jykge1xyXG4gICAgICAgICAgICAvL2V2ZW50LnByZXZlbnREZWZhdWx0KClcclxuICAgICAgICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rJykuY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZScpXHJcbiAgICAgICAgICAgIGNvbnN0IHVybElucHV0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rICN1cmxJbnB1dCcpXHJcbiAgICAgICAgICAgIHVybElucHV0LmZvY3VzKClcclxuICAgICAgICB9XHJcbiAgICB9KVxyXG59Il0sInNvdXJjZVJvb3QiOiIifQ==