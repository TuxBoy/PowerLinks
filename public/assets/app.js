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
    event.preventDefault();

    if (event.key === 't') {
      document.querySelector('#addFormLink').classList.toggle('hide');
      const urlInput = document.querySelector('#addFormLink #urlInput');
      urlInput.focus();
    }
  });
}

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsic2hvd0Zvcm1BZGRMaW5rIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwicHJldmVudERlZmF1bHQiLCJrZXkiLCJ1cmxJbnB1dCIsImZvY3VzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7O0FDQUE7QUFBQTtBQUFBO0FBQUE7QUFFQSxNQUFNQSxlQUFlLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixrQkFBdkIsQ0FBeEI7O0FBRUEsSUFBSUYsZUFBSixFQUFxQjtBQUNqQkEsaUJBQWUsQ0FBQ0csZ0JBQWhCLENBQWlDLE9BQWpDLEVBQTBDQyxLQUFLLElBQUk7QUFDL0NILFlBQVEsQ0FBQ0MsYUFBVCxDQUF1QixjQUF2QixFQUF1Q0csU0FBdkMsQ0FBaURDLE1BQWpELENBQXdELE1BQXhEO0FBQ0gsR0FGRDtBQUdBTCxVQUFRLENBQUNFLGdCQUFULENBQTBCLFNBQTFCLEVBQXFDQyxLQUFLLElBQUk7QUFDMUNBLFNBQUssQ0FBQ0csY0FBTjs7QUFDQSxRQUFJSCxLQUFLLENBQUNJLEdBQU4sS0FBYyxHQUFsQixFQUF1QjtBQUNuQlAsY0FBUSxDQUFDQyxhQUFULENBQXVCLGNBQXZCLEVBQXVDRyxTQUF2QyxDQUFpREMsTUFBakQsQ0FBd0QsTUFBeEQ7QUFDQSxZQUFNRyxRQUFRLEdBQUdSLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qix3QkFBdkIsQ0FBakI7QUFDQU8sY0FBUSxDQUFDQyxLQUFUO0FBQ0g7QUFDSixHQVBEO0FBUUgsQyIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iLCJpbXBvcnQgJy4uL2Nzcy9hcHAuc2NzcydcclxuXHJcbmNvbnN0IHNob3dGb3JtQWRkTGluayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNzaG93Rm9ybUFkZExpbmsnKVxyXG5cclxuaWYgKHNob3dGb3JtQWRkTGluaykge1xyXG4gICAgc2hvd0Zvcm1BZGRMaW5rLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZXZlbnQgPT4ge1xyXG4gICAgICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNhZGRGb3JtTGluaycpLmNsYXNzTGlzdC50b2dnbGUoJ2hpZGUnKVxyXG4gICAgfSlcclxuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLCBldmVudCA9PiB7XHJcbiAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKVxyXG4gICAgICAgIGlmIChldmVudC5rZXkgPT09ICd0Jykge1xyXG4gICAgICAgICAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjYWRkRm9ybUxpbmsnKS5jbGFzc0xpc3QudG9nZ2xlKCdoaWRlJylcclxuICAgICAgICAgICAgY29uc3QgdXJsSW5wdXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjYWRkRm9ybUxpbmsgI3VybElucHV0JylcclxuICAgICAgICAgICAgdXJsSW5wdXQuZm9jdXMoKVxyXG4gICAgICAgIH1cclxuICAgIH0pXHJcbn0iXSwic291cmNlUm9vdCI6IiJ9