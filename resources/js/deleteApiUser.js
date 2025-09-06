document.querySelectorAll('.deleteUserBtn').forEach(button => {
    button.addEventListener('click', async function () {
        const url = this.dataset.url;
        const redirect = this.dataset.redirect;

        const confirmed = await Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción desactivará al usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        });

        if (confirmed.isConfirmed) {
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: new URLSearchParams({ '_method': 'DELETE' }),
                });

                if (res.ok) {
                    await Swal.fire({
                        icon: 'success',
                        title: 'Usuario eliminado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.href = redirect;
                } else {
                    const data = await res.json();
                    throw new Error(data.message || 'Error al eliminar el usuario');
                }
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.message
                });
            }
        }
    });
});
