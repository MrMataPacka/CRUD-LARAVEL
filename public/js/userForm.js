document.getElementById('userForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    const btn = document.getElementById('btnSubmit');
    btn.disabled = true;

    const formData = new FormData(form);


    const method = form.querySelector('[name="_method"]')?.value || 'POST';

    if (method !== 'POST') {
        formData.append('_method', method);
    }
    if (method === 'POST') {
        const password = form.querySelector('input[name="password"]')?.value;
        const confirm = form.querySelector('input[name="password_confirmation"]')?.value;

        if (password !== confirm) {
            await Swal.fire({
                icon: 'error',
                title: 'Contraseñas no coinciden',
                text: 'Por favor asegúrate de que ambas contraseñas sean iguales.'
            });

            btn.disabled = false;
            return;
        }
    }

    try {
        const res = await fetch(form.action, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await res.json();

        if (res.ok) {
            await Swal.fire({
                icon: 'success',
                title: 'Usuario guardado correctamente',
                showConfirmButton: false,
                timer: 1500
            });

            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                location.reload();
            }
        } else if (res.status === 422) {
            const messages = Object.values(data.errors || {}).flat().join('<br>');
            Swal.fire({
                icon: 'error',
                title: 'Errores de validación',
                html: messages
            });
        } else {
            throw new Error(data.message || 'Error al guardar el usuario');
        }

    } catch (err) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: err.message
        });
    } finally {
        btn.disabled = false;
    }
});
