document.addEventListener('DOMContentLoaded', function () {
    // Tu código aquí
    document.getElementById('btn-regventa').addEventListener('click', () => {
        // Validar si los campos del formulario están llenos
        var nombres = document.getElementById("nombres").value;
        var dni = document.getElementById("dni").value;
        var correo = document.getElementById("correo").value;
        var ciudad = document.getElementById("ciudad").value;
        var apellidos = document.getElementById("apellidos").value;
        var telefono = document.getElementById("telefono").value;
        var descuento = document.getElementById("descuento").value;
        var valorTotal = document.getElementById("valor-total").value;

        if (!nombres || !dni || !correo || !ciudad || !apellidos || !telefono || !descuento || !valorTotal) {
            Swal.fire({
                title: "¡Error!",
                text: "Para registrar la venta, debe completar todos los campos del formulario.",
                icon: "error"
            });
            return; // Salir de la función si hay campos vacíos
        }

        // Validar si el array detallesVenta tiene al menos un elemento
        else if (detallesVenta.length === 0) {
            Swal.fire({
                title: "¡Error!",
                text: "No hay detalles de venta para registrar.",
                icon: "error"
            });
            return; // Salir de la función si no hay detalles de venta
        }

        // Aquí puedes agregar la lógica para enviar los datos de la venta a la base de datos
        Swal.fire({
            title: "¿Estás seguro de registrar la venta?",
            text: "Este proceso registrará la venta en la base de datos.",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Registrar Venta"
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar los datos del formulario y los detalles de venta al controlador
                enviarVentaAlControlador();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Acción cancelada",
                    text: "La acción de registrar la venta ha sido cancelada.",
                    icon: "info"
                });
            }
        });
    });

    // Función para enviar los datos del formulario y los detalles de venta al controlador
    function enviarVentaAlControlador() {
        // Aquí puedes enviar los datos del formulario y los detalles de venta al controlador
    }
});
