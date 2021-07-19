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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/axios/index.js":
/*!*************************************!*\
  !*** ./node_modules/axios/index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Users\\Utente\\Desktop\\classe 30\\Progetto Finale\\DeliveeBoo\\node_modules\\axios\\index.js'");

/***/ }),

/***/ "./node_modules/bootstrap/dist/js/bootstrap.js":
/*!*****************************************************!*\
  !*** ./node_modules/bootstrap/dist/js/bootstrap.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Users\\Utente\\Desktop\\classe 30\\Progetto Finale\\DeliveeBoo\\node_modules\\bootstrap\\dist\\js\\bootstrap.js'");

/***/ }),

/***/ "./node_modules/jquery/dist/jquery.js":
/*!********************************************!*\
  !*** ./node_modules/jquery/dist/jquery.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Users\\Utente\\Desktop\\classe 30\\Progetto Finale\\DeliveeBoo\\node_modules\\jquery\\dist\\jquery.js'");

/***/ }),

/***/ "./node_modules/lodash/lodash.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/lodash.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Users\\Utente\\Desktop\\classe 30\\Progetto Finale\\DeliveeBoo\\node_modules\\lodash\\lodash.js'");

/***/ }),

/***/ "./node_modules/popper.js/dist/esm/popper.js":
/*!***************************************************!*\
  !*** ./node_modules/popper.js/dist/esm/popper.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\Users\\Utente\\Desktop\\classe 30\\Progetto Finale\\DeliveeBoo\\node_modules\\popper.js\\dist\\esm\\popper.js'");

/***/ }),

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");
/**
 * DELETE POST CONFIRM
 */


var delForm = document.querySelectorAll(".delete-post-form"); //console.log(delForm);

delForm.forEach(function (form) {
  form.addEventListener("submit", function (e) {
    var resp = confirm("You really want to delete this post?");
    console.log(resp);

    if (!resp) {
      e.preventDefault();
    }
  });
});
var btnRegister = document.getElementById("register");

if (btnRegister) {
  btnRegister.addEventListener("click", function (el) {
    var name = document.getElementById("name").value;

    if (name === "") {
      alert("Insert Name");
    } else if (name.length > 30) {
      alert("Name is too long");
    }

    var surname = document.getElementById("surname").value;

    if (surname === "") {
      alert("Insert Surname");
    } else if (surname.length > 30) {
      alert("Surname is too long");
    }

    var piva = document.getElementById("piva").value;

    if (piva === "") {
      alert("Insert Piva");
    } else if (piva.length < 11) {
      alert("P.IVA must be  11");
    } else if (piva.length > 16) {
      alert("P.IVA must be  16");
    }

    var email = document.getElementById("email").value;

    if (email === "") {
      alert("Insert email");
    } else if (!email.includes("@")) {
      alert("Insert a valid email");
    }

    var password = document.getElementById("password").value;
    var confPassword = document.getElementById("password-confirm").value;

    if (password === "") {
      alert("Insert password");
    } else if (password.length < 8) {
      alert("Your password is too short");
    } else if (password !== confPassword) {
      alert("Your password does not match");
      el.preventDefault();
    }
  });
}

var btnCreate = document.getElementById("createRestaurant");

if (btnCreate) {
  btnCreate.addEventListener("click", function (ele) {
    var name = document.getElementById("name").value;

    if (name === "") {
      alert("Insert Restaurant Name");
    } else if (name.length > 30) {
      alert("Name is too long");
    }

    var address = document.getElementById("address").value;

    if (address === "") {
      alert("Insert address");
    }

    var city = document.getElementById("city").value;

    if (city === "") {
      alert("Insert city");
    }

    var cap = document.getElementById("cap").value;

    if (cap === "") {
      alert("Insert cap");
    } else if (cap.length > 5) {
      alert('Cap is invalid');
    }

    var phone_number = document.getElementById("phone_number").value;

    if (phone_number === "") {
      alert("Insert a phone number");
      ele.preventDefault();
    } else if (phone_number.length > 20) {
      alert('Phone number is too long');
      ele.preventDefault();
    }
    /* const cuisine = document.querySelectorAll("cuisines");
    if (!cuisine.checked) {
        alert("Please select a cuisine");
        el.preventDefault();
    } */

  });
}

var btnPlate = document.getElementById("createPlate");

if (btnPlate) {
  btnPlate.addEventListener("click", function (elem) {
    var name = document.getElementById("name").value;

    if (name === "") {
      alert("Insert Plate name");
    }

    var description = document.getElementById("description").value;

    if (description === "") {
      alert("Insert Plate description");
    }

    var price = document.getElementById("price").value;

    if (price === "") {
      alert("Insert Plate price");
      elem.preventDefault();
    }
  });
}

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")["default"];
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Utente\Desktop\classe 30\Progetto Finale\DeliveeBoo\resources\js\admin.js */"./resources/js/admin.js");


/***/ })

/******/ });