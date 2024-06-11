// AGREGAR DETALLE VENTA EN EL MODAL



// Variable para almacenar el precio por hora
var precioPorHora;
var cantidadHoras;
var valorTotal;
var valorHoraClase;
function actualizarValorTotal() {
    console.log('Cantidad de horas funcion actualizar:', cantidadHoras);
    console.log('Precio por hora o clase funcion actualizar:', valorHoraClase.value);
    valorTotal = valorHoraClase.value * cantidadHoras;
    inputValorUnidad.value = valorTotal;
}

// Función para actualizar los datos
function actualizarCursos() {
    // Enviar el valor al controlador para obtener los cursos

    fetch('controller_regventa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'categoria_seleccionada=' + encodeURIComponent(selectCategorias.value),
    })
        .then(response => response.json())
        .then(data => {
            // Actualizar el segundo select con los cursos recibidos
            var selectCursos = document.getElementById("nombre-curso");
            selectCursos.innerHTML = '';  // Limpiar las opciones existentes

            // Crear y agregar la opción por defecto
            var defaultOption = new Option("Seleccione una opción", "");
            selectCursos.options[0] = defaultOption;

            // Agregar nuevas opciones al segundo select
            for (var i = 1; i < data.cursos.length; i++) { // Comenzamos desde 1 para evitar sobreescribir la opción por defecto
                var option = document.createElement('option');
                option.value = data.cursos[i];
                option.text = data.cursos[i];
                selectCursos.add(option);
            }
            // // Acceder al precio por hora y actualizar el valor del input "valor-hora"
            // precioPorHora = data.precio;

            // // Actualizar el valor del input "valor-hora"
            // var inputValorHora = document.getElementById("valor-hora");
            // inputValorHora.value = precioPorHora;

            // // Actualizar el valor total
            // actualizarValorTotal();
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
// Obtener el elemento select por su ID
var selectCategorias = document.getElementById("categoria-curso");
// Llamar a la función cuando cambie la categoría
selectCategorias.addEventListener('change', actualizarCursos);

//obtener el elemento select Modalidaddes por su id
//llamar a la función cuando cambie la modalidad
// cuando cambie necesito actualizar el precio por hora

// Definir tipoVenta en un ámbito accesible para ambos manejadores de eventos
document.addEventListener('DOMContentLoaded', function () {
    var selectModalidad = document.getElementById("modalidad");
    var inputValorHora = document.getElementById("valor-hora");
    var selectTipoVenta = document.getElementById("tipo-venta");
    var tipoVenta;

    // Función para actualizar los precios
    function actualizarPrecios() {
        var modalidadSeleccionada = selectModalidad.value;
        var precioPorHora = selectModalidad.options[selectModalidad.selectedIndex].dataset.pricehour;
        var precioPorClase = selectModalidad.options[selectModalidad.selectedIndex].dataset.priceclass;
        console.log('Precio por hora:', precioPorHora);
        console.log('Precio por clase:', precioPorClase);

        if (tipoVenta == "clases") {
            valorHoraClase = document.getElementById("valor-hora-clase");
            valorHoraClase.value = precioPorClase;
        }
        if (tipoVenta == "horas") {
            valorHoraClase = document.getElementById("valor-hora-clase");
            valorHoraClase.value = precioPorHora;
        }
        actualizarValorTotal();
    }

    // Asignar el valor de tipoVenta cuando cambie la selección en selectTipoVenta
    selectTipoVenta.addEventListener('change', function () {
        tipoVenta = selectTipoVenta.value;
        // Actualizar los precios cuando cambia el tipo de venta
        actualizarPrecios();
    });

    selectModalidad.addEventListener('change', function () {
        // Actualizar los precios cuando cambia la modalidad
        actualizarPrecios();
    });
});







// capturar el select
// Capturar el valor del input de cantidad de horas
var inputCantidadHoras = document.getElementById("cantidad-horas-clases");
inputCantidadHoras.addEventListener('input', function () {
    cantidadHoras = inputCantidadHoras.value;
    actualizarValorTotal();
});

var inputValorUnidad = document.getElementById("valor-unidad");



//  GUARDAR DETALLE FUNCIONALIDADES
var detallesVenta = [];

// Cargar detalles desde localStorage si existen
if (localStorage.getItem('detallesVenta')) {
    detallesVenta = JSON.parse(localStorage.getItem('detallesVenta'));
    // Agregar filas a la tabla por cada detalle guardado en localStorage
    detallesVenta.forEach(agregarFilaDetalle);
}

var btnGuardarDetalle = document.getElementById("agregar-detalle");
btnGuardarDetalle.addEventListener("click", function () {
    var tipoVenta2 = document.getElementById("tipo-venta").value;
    var modalidad2 = document.getElementById("modalidad").value;
    var categoria = document.getElementById("categoria-curso").value;
    var curso = document.getElementById("nombre-curso").value;
    var horas = parseFloat(document.getElementById("cantidad-horas-clases").value);
    var valorHoraClase = parseFloat(document.getElementById("valor-hora-clase").value);
    var valorCurso = parseFloat(document.getElementById("valor-unidad").value);

    // Validar que todos los campos estén llenos
    if (tipoVenta2 == '' || modalidad2 == '' || categoria == '' || curso == '' || isNaN(horas) || isNaN(valorHoraClase) || isNaN(valorCurso)) {
        console.log("horas: " + horas + " Valor: " + valorHora + " Valor Total: " + valorCurso);
        alert("Los campos no están completos");

    } else {
        // Agregar el detalle al array
        detallesVenta.push({
            tipoVenta: tipoVenta2,
            modalidad: modalidad2,
            categoria: categoria,
            curso: curso,
            cantidad_horas_clases: horas,
            valorHoraClase: valorHoraClase,
            valorCurso: valorCurso
        });
        calcularValorTotalCursos();
        // Guardar detalles en localStorage
        localStorage.setItem('detallesVenta', JSON.stringify(detallesVenta));

        $('#modal-add-detalle').modal('hide');
        agregarFilaDetalle(detallesVenta[detallesVenta.length - 1]);
    }
})

// Tu código aquí
$('#modal-add-detalle').on('show.bs.modal', function (e) {
    // Reseteaario
    $('#detalle-form')[0].reset();
});

// AGREGAR LOS DETALLES A LA TABLA

function agregarFilaDetalle(detalle) {

    var tabla = document.getElementById('tabla-detalles').getElementsByTagName('tbody')[0];

    var fila = tabla.insertRow();
    var celdaTipoVenta = fila.insertCell(0);
    var celdaModalidad = fila.insertCell(1);
    var celdaCategoria = fila.insertCell(2);
    var celdaCurso = fila.insertCell(3);
    var celdaHoras = fila.insertCell(4);
    var celdaValorHoraClase = fila.insertCell(5);
    var celdaSubtotal = fila.insertCell(6);
    var celdaEditar = fila.insertCell(7);
    celdaTipoVenta.innerHTML = detalle.tipoVenta;
    celdaModalidad.innerHTML = detalle.modalidad;
    celdaCategoria.innerHTML = detalle.categoria;
    celdaCurso.innerHTML = detalle.curso;
    celdaHoras.innerHTML = detalle.cantidad_horas_clases;
    celdaValorHoraClase.innerHTML = detalle.valorHoraClase;
    celdaSubtotal.innerHTML = detalle.valorCurso;

    var botonEliminar = document.createElement('button');
    botonEliminar.className = 'btn btn-danger btn-sm ml-2';
    botonEliminar.innerHTML = '<i class="bi bi-trash-fill"></i> Borrar';
    botonEliminar.addEventListener('click', function () {
        // Lógica para borrar la fila
        eliminarDetalle(detalle, fila);
        calcularValorTotalCursos();
    });


    celdaEditar.appendChild(botonEliminar);
}

// Función para eliminar un detalle de la tabla y del array
function eliminarDetalle(detalle, fila) {
    // Eliminar la fila de la tabla
    fila.parentNode.removeChild(fila);

    // Encontrar el índice del detalle en el array
    var indice = detallesVenta.findIndex(function (item) {
        return item === detalle;
    });

    // Eliminar el detalle del array
    if (indice !== -1) {
        detallesVenta.splice(indice, 1);
        // Actualizar localStorage después de borrar
        localStorage.setItem('detallesVenta', JSON.stringify(detallesVenta));
    }
}

// Resto de tu código...

// Variable para almacenar la suma total de valorCurso
var valorTotalCursos = 0;

// Variable para almacenar la suma total de valorCurso
var valorTotalCursos = 0;

// Variable para almacenar la suma total de valorCurso
var valorTotalOriginal = 0;

// Función para calcular la suma total de valorCurso
function calcularValorTotalCursos() {
    valorTotalCursos = 0;

    detallesVenta.forEach(function (detalle) {
        valorTotalCursos += detalle.valorCurso;
    });

    console.log("La suma de valorCurso jajajajaj: " + valorTotalCursos);

    // Actualizar el valor del input con ID "valor-total"
    var inputValorTotal = document.getElementById("valor-total");
    if (inputValorTotal) {
        inputValorTotal.value = valorTotalCursos.toFixed(2); // Asegurarse de tener dos decimales
    }

    // Actualizar el valor total original antes de aplicar el descuento
    valorTotalOriginal = valorTotalCursos;

    // Restar el descuento si existe
    restarDescuento();
}

// Función para restar el descuento del valor total
function restarDescuento() {
    var inputDescuento = document.getElementById("descuento");
    var descuento = parseFloat(inputDescuento.value) || 0;

    // Restar el descuento solo una vez al valor total original
    var valorTotalConDescuento = valorTotalOriginal - descuento;

    // Actualizar el valor del input con ID "valor-total"
    var inputValorTotal = document.getElementById("valor-total");
    if (inputValorTotal) {
        inputValorTotal.value = valorTotalConDescuento.toFixed(2); // Asegurarse de tener dos decimales
    }
}

// Llamada a la función después de cargar la página y cada vez que se actualizan los detalles
actualizarCursos();
calcularValorTotalCursos();

// Capturar el valor del input de descuento
var inputDescuento = document.getElementById("descuento");
inputDescuento.addEventListener('input', function () {
    restarDescuento();
});

