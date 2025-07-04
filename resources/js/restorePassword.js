document.getElementById('restoreForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const redirect = this.dataset.redirect;
    const email = document.getElementById('email').value;

    if (!email) {
        Swal.fire({
            icon: 'error',
            title: 'Campo vacío',
            text: 'Por favor ingresa tu correo electrónico.',
        });
        return;
    }

    await Swal.fire({
        icon: 'success',
        title: 'Correo enviado',
        text: `Si el correo ${email} está registrado, recibirás instrucciones para restablecer tu contraseña.`,
    });

    window.location.href = redirect;
});
