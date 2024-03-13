// AGREGAR DETALLE VENTA EN EL MODAL

// Obtener el elemento select por su ID
var selectCategorias = document.getElementById("categoria-curso");

// Variable para almacenar el precio por hora
var precioPorHora;
var cantidadHoras;
var valorTotal;

function actualizarValorTotal() {
    valorTotal = precioPorHora * cantidadHoras;
    inputValorUnidad.value = valorTotal;
}

// Función para actualizar los datos
function actualizarDatos() {
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

            // Agregar nuevas opciones al segundo select
            for (var i = 0; i < data.cursos.length; i++) {
                var option = document.createElement('option');
                option.value = data.cursos[i];
                option.text = data.cursos[i];
                selectCursos.add(option);
            }

            // Acceder al precio por hora y actualizar el valor del input "valor-hora"
            precioPorHora = data.precio;

            // Actualizar el valor del input "valor-hora"
            var inputValorHora = document.getElementById("valor-hora");
            inputValorHora.value = precioPorHora;

            // Actualizar el valor total
            actualizarValorTotal();
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Llamar a la función cuando cambie la categoría
selectCategorias.addEventListener('change', actualizarDatos);

// Capturar el valor del input de cantidad de horas
var inputCantidadHoras = document.getElementById("cantidad-horas");
inputCantidadHoras.addEventListener('input', function () {
    cantidadHoras = inputCantidadHoras.value;
    console.log('Cantidad de horas xdddd:', cantidadHoras);
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
    console.log("holamundo");
}

var btnGuardarDetalle = document.getElementById("agregar-detalle");
btnGuardarDetalle.addEventListener("click", function () {
    var categoria = document.getElementById("categoria-curso").value;
    var curso = document.getElementById("nombre-curso").value;
    var horas = parseFloat(document.getElementById("cantidad-horas").value);
    var valorHora = parseFloat(document.getElementById("valor-hora").value);
    var valorCurso = parseFloat(document.getElementById("valor-unidad").value);

    // Validar que todos los campos estén llenos
    if (categoria == '' || curso == '' || isNaN(horas) || isNaN(valorHora) || isNaN(valorCurso)) {
        console.log("horas: " + horas + " Valor: " + valorHora + " Valor Total: " + valorCurso);
        alert("Los campos no están completos");

    } else {
        // Agregar el detalle al array
        detallesVenta.push({
            categoria: categoria,
            curso: curso,
            horas: horas,
            valorHora: valorHora,
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

    var celdaCategoria = fila.insertCell(0);
    var celdaCurso = fila.insertCell(1);
    var celdaHoras = fila.insertCell(2);
    var celdaValorHora = fila.insertCell(3);
    var celdaSubtotal = fila.insertCell(4);
    var celdaEditar = fila.insertCell(5);

    celdaCategoria.innerHTML = detalle.categoria;
    celdaCurso.innerHTML = detalle.curso;
    celdaHoras.innerHTML = detalle.horas;
    celdaValorHora.innerHTML = detalle.valorHora;
    celdaSubtotal.innerHTML = detalle.valorCurso;

    // Agregar botón de editar con un ícono de Bootstrap
    var botonEditar = document.createElement('button');
    botonEditar.className = 'btn btn-primary btn-sm';
    botonEditar.innerHTML = '<i class="bi bi-pencil"></i> Editar';
    botonEditar.addEventListener('click', function () {
        // Lógica para editar la fila
        console.log('Editar fila:', detalle);
    });

    var botonEliminar = document.createElement('button');
    botonEliminar.className = 'btn btn-danger btn-sm ml-2';
    botonEliminar.innerHTML = '<i class="bi bi-trash-fill"></i> Borrar';
    botonEliminar.addEventListener('click', function () {
        // Lógica para borrar la fila
        eliminarDetalle(detalle, fila);
        calcularValorTotalCursos();
    });

    celdaEditar.appendChild(botonEditar);
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

    detallesVenta.forEach(function(detalle) {
        valorTotalCursos += detalle.valorCurso;
    });

    console.log("La suma de valorCurso es: " + valorTotalCursos);

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
actualizarDatos();
calcularValorTotalCursos();

// Capturar el valor del input de descuento
var inputDescuento = document.getElementById("descuento");
inputDescuento.addEventListener('input', function () {
    restarDescuento();
});

