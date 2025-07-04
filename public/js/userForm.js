/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/userForm.js ***!
  \**********************************/
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { if (r) i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n;else { var o = function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); }; o("next", 0), o("throw", 1), o("return", 2); } }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
document.getElementById('userForm').addEventListener('submit', /*#__PURE__*/function () {
  var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(e) {
    var _form$querySelector;
    var form, btn, formData, userImageInput, method, _form$querySelector2, _form$querySelector3, password, confirm, res, data, messages, _t;
    return _regenerator().w(function (_context) {
      while (1) switch (_context.n) {
        case 0:
          e.preventDefault();
          form = this;
          btn = document.getElementById('btnSubmit');
          btn.disabled = true;
          formData = new FormData(form);
          userImageInput = form.querySelector('input[name="user_image"]');
          if (!userImageInput.files.length) {
            formData.append('photo', 'img/users-icons/Sample_User_Icon.png');
          }
          method = ((_form$querySelector = form.querySelector('[name="_method"]')) === null || _form$querySelector === void 0 ? void 0 : _form$querySelector.value) || 'POST';
          if (method !== 'POST') {
            formData.append('_method', method);
          }
          if (!(method === 'POST')) {
            _context.n = 2;
            break;
          }
          password = (_form$querySelector2 = form.querySelector('input[name="password"]')) === null || _form$querySelector2 === void 0 ? void 0 : _form$querySelector2.value;
          confirm = (_form$querySelector3 = form.querySelector('input[name="password_confirmation"]')) === null || _form$querySelector3 === void 0 ? void 0 : _form$querySelector3.value;
          if (!(password !== confirm)) {
            _context.n = 2;
            break;
          }
          _context.n = 1;
          return Swal.fire({
            icon: 'error',
            title: 'Contraseñas no coinciden',
            text: 'Por favor asegúrate de que ambas contraseñas sean iguales.'
          });
        case 1:
          btn.disabled = false;
          return _context.a(2);
        case 2:
          _context.p = 2;
          _context.n = 3;
          return fetch(form.action, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json'
            },
            body: formData
          });
        case 3:
          res = _context.v;
          _context.n = 4;
          return res.json();
        case 4:
          data = _context.v;
          if (!res.ok) {
            _context.n = 6;
            break;
          }
          _context.n = 5;
          return Swal.fire({
            icon: 'success',
            title: 'Usuario guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          });
        case 5:
          if (data.redirect) {
            window.location.href = data.redirect;
          } else {
            location.reload();
          }
          _context.n = 8;
          break;
        case 6:
          if (!(res.status === 422)) {
            _context.n = 7;
            break;
          }
          messages = Object.values(data.errors || {}).flat().join('<br>');
          Swal.fire({
            icon: 'error',
            title: 'Errores de validación',
            html: messages
          });
          _context.n = 8;
          break;
        case 7:
          throw new Error(data.message || 'Error al guardar el usuario');
        case 8:
          _context.n = 10;
          break;
        case 9:
          _context.p = 9;
          _t = _context.v;
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: _t.message
          });
        case 10:
          _context.p = 10;
          btn.disabled = false;
          return _context.f(10);
        case 11:
          return _context.a(2);
      }
    }, _callee, this, [[2, 9, 10, 11]]);
  }));
  return function (_x) {
    return _ref.apply(this, arguments);
  };
}());
/******/ })()
;