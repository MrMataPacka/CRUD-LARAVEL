/******/ (() => { // webpackBootstrap
/*!***********************************!*\
  !*** ./resources/js/userIndex.js ***!
  \***********************************/
document.addEventListener('DOMContentLoaded', function () {
  var table = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: $('#usersTable').data('url'),
    columns: [{
      data: 'photo',
      name: 'photo',
      orderable: false,
      searchable: false
    }, {
      data: 'name',
      name: 'name'
    }, {
      data: 'last_name',
      name: 'last_name'
    }, {
      data: 'email',
      name: 'email'
    }, {
      data: 'acciones',
      name: 'acciones',
      orderable: false,
      searchable: false
    }]
  });
  table.on('draw.dt', function () {
    document.querySelectorAll('.deleteUserBtn').forEach(function (btn) {
      var clone = btn.cloneNode(true);
      btn.parentNode.replaceChild(clone, btn);
    });
    var script = document.createElement('script');
    script.src = '/js/deleteButton.js';
    document.body.appendChild(script);
  });
});
/******/ })()
;