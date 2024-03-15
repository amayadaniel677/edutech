
// Selecciona todos los botones con la clase "btn-eliminar"
const btnsEliminar = document.querySelectorAll('.btn-eliminar');

// Agrega el evento de clic a cada botón
btnsEliminar.forEach((btn) => {
    btn.addEventListener('click', function() {
        const id = btn.getAttribute('data-id'); // Obtiene el valor del atributo data-id
        Swal.fire({
            title: "¿Estás seguro de eliminar el pedido?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Pedido eliminado!",
                    icon: "success"
                });
                // Redirigir al usuario a la página especificada
                window.location.href = "youtube.com?idEliminar=" + this.getAttribute('data-idEliminar');
            }
        });
    });
});