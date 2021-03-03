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

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nError: Cannot find module '/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/helper-compilation-targets/lib/index.js'\n    at createEsmNotFoundErr (internal/modules/cjs/loader.js:907:15)\n    at finalizeEsmResolution (internal/modules/cjs/loader.js:900:15)\n    at resolveExports (internal/modules/cjs/loader.js:432:14)\n    at Function.Module._findPath (internal/modules/cjs/loader.js:472:31)\n    at Function.Module._resolveFilename (internal/modules/cjs/loader.js:867:27)\n    at Function.Module._load (internal/modules/cjs/loader.js:725:27)\n    at Module.require (internal/modules/cjs/loader.js:952:19)\n    at require (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/v8-compile-cache/v8-compile-cache.js:159:20)\n    at _helperCompilationTargets (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/validation/option-assertions.js:28:16)\n    at assertTargets (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/validation/option-assertions.js:285:11)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/validation/options.js:116:5\n    at Array.forEach (<anonymous>)\n    at validateNested (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/validation/options.js:92:21)\n    at validate (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/validation/options.js:83:10)\n    at loadPrivatePartialConfig (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/partial.js:80:50)\n    at loadPrivatePartialConfig.next (<anonymous>)\n    at loadFullConfig (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/config/full.js:61:46)\n    at loadFullConfig.next (<anonymous>)\n    at Function.transform (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/transform.js:25:45)\n    at transform.next (<anonymous>)\n    at step (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/gensync/index.js:261:32)\n    at evaluateAsync (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/gensync/index.js:291:5)\n    at Function.errback (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/gensync/index.js:113:7)\n    at transform (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/@babel/core/lib/transform.js:37:19)\n    at internal/util.js:297:30\n    at new Promise (<anonymous>)\n    at transform (internal/util.js:296:12)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:22:22\n    at Generator.next (<anonymous>)\n    at asyncGeneratorStep (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:3:103)\n    at _next (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:5:194)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:5:364\n    at new Promise (<anonymous>)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:5:97\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/transform.js:55:17\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/babel-loader/lib/cache.js:142:26");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Can't find stylesheet to import.\n  ╷\n6 │ @import '~bootstrap/scss/bootstrap';\n  │         ^^^^^^^^^^^^^^^^^^^^^^^^^^^\n  ╵\n  /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/resources/sass/app.scss 6:9  root stylesheet\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/webpack/lib/NormalModule.js:316:20\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/loader-runner/lib/LoaderRunner.js:367:11\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/loader-runner/lib/LoaderRunner.js:233:18\n    at context.callback (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass-loader/dist/index.js:73:7\n    at Function.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:91729:16)\n    at _render_closure1.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:80373:12)\n    at _RootZone.runBinary$3$3 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:27269:18)\n    at _FutureListener.handleError$1 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25797:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:26094:49)\n    at Object._Future__propagateToListeners (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4543:77)\n    at _Future._completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25927:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25270:12)\n    at Object._asyncRethrow (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4292:17)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:13233:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4317:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25291:12)\n    at _awaitOnObject_closure0.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25283:25)\n    at _RootZone.runBinary$3$3 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:27269:18)\n    at _FutureListener.handleError$1 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25797:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:26094:49)\n    at Object._Future__propagateToListeners (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4543:77)\n    at _Future._completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25927:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25270:12)\n    at Object._asyncRethrow (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4292:17)\n    at /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:18031:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4317:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25291:12)\n    at _awaitOnObject_closure0.call$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25283:25)\n    at _RootZone.runBinary$3$3 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:27269:18)\n    at _FutureListener.handleError$1 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25797:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:26094:49)\n    at Object._Future__propagateToListeners (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4543:77)\n    at _Future._completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25927:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:25270:12)\n    at Object._asyncRethrow (/Users/natalia/Desktop/Repos Laravel/proj21-team3/main/node_modules/sass/sass.dart.js:4292:17)");

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/natalia/Desktop/Repos Laravel/proj21-team3/main/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });

// test