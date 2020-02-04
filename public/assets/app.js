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
    event.preventDefault();
    document.querySelector('#addFormLink').classList.toggle('hide');
  });
  document.addEventListener('keydown', event => {
    const addFormLink = document.querySelector('#addFormLink');

    if (event.key === 't' && addFormLink.classList.contains('hide')) {
      event.preventDefault();
      document.querySelector('#addFormLink').classList.toggle('hide');
      const urlInput = document.querySelector('#addFormLink #urlInput');
      urlInput.focus();
    } else if (event.key === 'Escape') {
      addFormLink.classList.toggle('hide');
    }
  });
}

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsic2hvd0Zvcm1BZGRMaW5rIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwicHJldmVudERlZmF1bHQiLCJjbGFzc0xpc3QiLCJ0b2dnbGUiLCJhZGRGb3JtTGluayIsImtleSIsImNvbnRhaW5zIiwidXJsSW5wdXQiLCJmb2N1cyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsdUM7Ozs7Ozs7Ozs7OztBQ0FBO0FBQUE7QUFBQTtBQUFBO0FBRUEsTUFBTUEsZUFBZSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsa0JBQXZCLENBQXhCOztBQUVBLElBQUlGLGVBQUosRUFBcUI7QUFDakJBLGlCQUFlLENBQUNHLGdCQUFoQixDQUFpQyxPQUFqQyxFQUEwQ0MsS0FBSyxJQUFJO0FBQy9DQSxTQUFLLENBQUNDLGNBQU47QUFDQUosWUFBUSxDQUFDQyxhQUFULENBQXVCLGNBQXZCLEVBQXVDSSxTQUF2QyxDQUFpREMsTUFBakQsQ0FBd0QsTUFBeEQ7QUFDSCxHQUhEO0FBSUFOLFVBQVEsQ0FBQ0UsZ0JBQVQsQ0FBMEIsU0FBMUIsRUFBcUNDLEtBQUssSUFBSTtBQUMxQyxVQUFNSSxXQUFXLEdBQUdQLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixjQUF2QixDQUFwQjs7QUFDQSxRQUFJRSxLQUFLLENBQUNLLEdBQU4sS0FBYyxHQUFkLElBQXFCRCxXQUFXLENBQUNGLFNBQVosQ0FBc0JJLFFBQXRCLENBQStCLE1BQS9CLENBQXpCLEVBQWlFO0FBQzdETixXQUFLLENBQUNDLGNBQU47QUFDQUosY0FBUSxDQUFDQyxhQUFULENBQXVCLGNBQXZCLEVBQXVDSSxTQUF2QyxDQUFpREMsTUFBakQsQ0FBd0QsTUFBeEQ7QUFDQSxZQUFNSSxRQUFRLEdBQUdWLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qix3QkFBdkIsQ0FBakI7QUFDQVMsY0FBUSxDQUFDQyxLQUFUO0FBQ0gsS0FMRCxNQUtPLElBQUlSLEtBQUssQ0FBQ0ssR0FBTixLQUFjLFFBQWxCLEVBQTRCO0FBQy9CRCxpQkFBVyxDQUFDRixTQUFaLENBQXNCQyxNQUF0QixDQUE2QixNQUE3QjtBQUNIO0FBQ0osR0FWRDtBQVdILEMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiaW1wb3J0ICcuLi9jc3MvYXBwLnNjc3MnXHJcblxyXG5jb25zdCBzaG93Rm9ybUFkZExpbmsgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjc2hvd0Zvcm1BZGRMaW5rJylcclxuXHJcbmlmIChzaG93Rm9ybUFkZExpbmspIHtcclxuICAgIHNob3dGb3JtQWRkTGluay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGV2ZW50ID0+IHtcclxuICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpXHJcbiAgICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rJykuY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZScpXHJcbiAgICB9KVxyXG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcigna2V5ZG93bicsIGV2ZW50ID0+IHtcclxuICAgICAgICBjb25zdCBhZGRGb3JtTGluayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNhZGRGb3JtTGluaycpXHJcbiAgICAgICAgaWYgKGV2ZW50LmtleSA9PT0gJ3QnICYmIGFkZEZvcm1MaW5rLmNsYXNzTGlzdC5jb250YWlucygnaGlkZScpKSB7XHJcbiAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KClcclxuICAgICAgICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rJykuY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZScpXHJcbiAgICAgICAgICAgIGNvbnN0IHVybElucHV0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZEZvcm1MaW5rICN1cmxJbnB1dCcpXHJcbiAgICAgICAgICAgIHVybElucHV0LmZvY3VzKClcclxuICAgICAgICB9IGVsc2UgaWYgKGV2ZW50LmtleSA9PT0gJ0VzY2FwZScpIHtcclxuICAgICAgICAgICAgYWRkRm9ybUxpbmsuY2xhc3NMaXN0LnRvZ2dsZSgnaGlkZScpXHJcbiAgICAgICAgfVxyXG4gICAgfSlcclxufSJdLCJzb3VyY2VSb290IjoiIn0=