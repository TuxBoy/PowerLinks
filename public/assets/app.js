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
      event.preventDefault();
      document.querySelector('#addFormLink').classList.toggle('hide');
      const urlInput = document.querySelector('#addFormLink #urlInput');
      urlInput.focus();
    }
  });
}

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsic2hvd0Zvcm1BZGRMaW5rIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwia2V5IiwicHJldmVudERlZmF1bHQiLCJ1cmxJbnB1dCIsImZvY3VzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7O0FDQUE7QUFBQTtBQUFBO0FBQUE7QUFFQSxNQUFNQSxlQUFlLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixrQkFBdkIsQ0FBeEI7O0FBRUEsSUFBSUYsZUFBSixFQUFxQjtBQUNqQkEsaUJBQWUsQ0FBQ0csZ0JBQWhCLENBQWlDLE9BQWpDLEVBQTBDQyxLQUFLLElBQUk7QUFDL0NILFlBQVEsQ0FBQ0MsYUFBVCxDQUF1QixjQUF2QixFQUF1Q0csU0FBdkMsQ0FBaURDLE1BQWpELENBQXdELE1BQXhEO0FBQ0gsR0FGRDtBQUdBTCxVQUFRLENBQUNFLGdCQUFULENBQTBCLFNBQTFCLEVBQXFDQyxLQUFLLElBQUk7QUFDMUMsUUFBSUEsS0FBSyxDQUFDRyxHQUFOLEtBQWMsR0FBbEIsRUFBdUI7QUFDbkJILFdBQUssQ0FBQ0ksY0FBTjtBQUNBUCxjQUFRLENBQUNDLGFBQVQsQ0FBdUIsY0FBdkIsRUFBdUNHLFNBQXZDLENBQWlEQyxNQUFqRCxDQUF3RCxNQUF4RDtBQUNBLFlBQU1HLFFBQVEsR0FBR1IsUUFBUSxDQUFDQyxhQUFULENBQXVCLHdCQUF2QixDQUFqQjtBQUNBTyxjQUFRLENBQUNDLEtBQVQ7QUFDSDtBQUNKLEdBUEQ7QUFRSCxDIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsImltcG9ydCAnLi4vY3NzL2FwcC5zY3NzJ1xyXG5cclxuY29uc3Qgc2hvd0Zvcm1BZGRMaW5rID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI3Nob3dGb3JtQWRkTGluaycpXHJcblxyXG5pZiAoc2hvd0Zvcm1BZGRMaW5rKSB7XHJcbiAgICBzaG93Rm9ybUFkZExpbmsuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBldmVudCA9PiB7XHJcbiAgICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rJykuY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZScpXHJcbiAgICB9KVxyXG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcigna2V5ZG93bicsIGV2ZW50ID0+IHtcclxuICAgICAgICBpZiAoZXZlbnQua2V5ID09PSAndCcpIHtcclxuICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKVxyXG4gICAgICAgICAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjYWRkRm9ybUxpbmsnKS5jbGFzc0xpc3QudG9nZ2xlKCdoaWRlJylcclxuICAgICAgICAgICAgY29uc3QgdXJsSW5wdXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjYWRkRm9ybUxpbmsgI3VybElucHV0JylcclxuICAgICAgICAgICAgdXJsSW5wdXQuZm9jdXMoKVxyXG4gICAgICAgIH1cclxuICAgIH0pXHJcbn0iXSwic291cmNlUm9vdCI6IiJ9