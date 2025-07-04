document.addEventListener('DOMContentLoaded', function () {
    const table = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: $('#usersTable').data('url'),
        columns: [
            { data: 'photo', name: 'photo', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'acciones', name: 'acciones', orderable: false, searchable: false }
        ]
    });

    table.on('draw.dt', function () {
        document.querySelectorAll('.deleteUserBtn').forEach(btn => {
            const clone = btn.cloneNode(true);
            btn.parentNode.replaceChild(clone, btn);
        });

        const script = document.createElement('script');
        script.src = '/js/deleteButton.js';
        document.body.appendChild(script);
    });
});
