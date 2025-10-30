
document.getElementById('form-registro-cliente').addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const respuesta = await fetch('../controller/co_registrar_cliente.php', {
        method: 'POST',
        body: formData
    });
    const data = await respuesta.json();
    const mensaje = document.getElementById('mensaje');
    mensaje.textContent = data.message;
    mensaje.className = data.success ? 'text-success' : 'text-danger';
    if (data.success) e.target.reset();
});
