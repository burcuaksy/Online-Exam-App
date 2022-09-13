/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/routes.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "route": () => (/* binding */ route)
/* harmony export */ });
var routes = {
  "debugbar.openhandler": {
    "uri": "_debugbar\/open"
  },
  "debugbar.clockwork": {
    "uri": "_debugbar\/clockwork\/{id}"
  },
  "debugbar.telescope": {
    "uri": "_debugbar\/telescope\/{id}"
  },
  "debugbar.assets.css": {
    "uri": "_debugbar\/assets\/stylesheets"
  },
  "debugbar.assets.js": {
    "uri": "_debugbar\/assets\/javascript"
  },
  "debugbar.cache.delete": {
    "uri": "_debugbar\/cache\/{key}\/{tags?}"
  },
  "generated::AB9FIt6JHEA58qLL": {
    "uri": "api\/user"
  },
  "home.index": {
    "uri": "\/"
  },
  "examGetlist": {
    "uri": "\/{name}\/{question}"
  },
  "examDelete": {
    "uri": "\/delete\/exam\/{id}\/{use}"
  },
  "examlist": {
    "uri": "\/exam-list"
  },
  "examEdit": {
    "uri": "\/edit\/exam\/{id}"
  },
  "examSolve": {
    "uri": "\/solve\/exam\/{id}"
  },
  "examResultwith": {
    "uri": "\/exam\/exam-result\/{id}"
  }
};

var route = function route(routeName) {
  var params = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [];
  var absolute = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
  var _route = routes[routeName];
  if (_route == null) throw "Requested route doesn't exist";
  var uri = _route.uri;
  var matches = uri.match(/{[\w]+}/g) || [];
  var requiredParametersCount = matches.length;

  if (params instanceof Array) {
    if (params.length < requiredParametersCount) throw "Missing parameters";

    for (var i = 0; i < requiredParametersCount; i++) {
      uri = uri.replace(/{[\w]+}/, params.shift());
    }

    for (var _i = 0; _i < params.length; _i++) {
      uri += (_i ? "&" : "?") + params[_i] + "=" + params[_i];
    }
  } else if (params instanceof Object) {
    var extraParams = matches.reduce(function (ac, match) {
      var key = match.substring(1, match.length - 1);

      if (params.hasOwnProperty(key)) {
        uri = uri.replace(new RegExp(match, "g"), params[key]);
        delete ac[key];
      }

      return ac;
    }, params);
    Object.keys(extraParams).forEach(function (key, i) {
      uri += (i ? "&" : "?") + key + "=" + extraParams[key];
    });
  }

  if (uri.includes("}")) throw "Missing parameters";
  return "http://localhost:8000" + uri;
};


/******/ })()
;