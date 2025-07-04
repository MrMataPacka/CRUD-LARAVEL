document.addEventListener('DOMContentLoaded', () => {
    const stateSelect = document.getElementById('stateSelect');
    const townSelect = document.getElementById('townSelect');

    stateSelect.addEventListener('change', async function () {
        const staid = this.value;
        townSelect.innerHTML = `<option value="">Cargando ciudades...</option>`;

        if (!staid) {
            townSelect.innerHTML = `<option value="">Selecciona un estado primero</option>`;
            return;
        }

        try {
            const res = await fetch(`/api/towns/${staid}`);
            const towns = await res.json();

            townSelect.innerHTML = `<option value="">Selecciona una ciudad</option>`;
            towns.forEach(town => {
                townSelect.innerHTML += `<option value="${town.towid}">${town.name}</option>`;
            });
        } catch (err) {
            console.error('Error al cargar ciudades:', err);
            townSelect.innerHTML = `<option value="">Error al cargar ciudades</option>`;
        }
    });
});
