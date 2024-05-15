<!-- SwadeetAlert2 -->
<link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="../../../view/admin/plugins/toastr/toastr.min.css">
<!-- css alertas mensajes -->
<link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" /> <!-- necesario para el tamaño de mensajes alerta  -->


<button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
    Launch Success Toast
</button>
<button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
    error
</button>
<button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
    error
</button>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- sweet alert -->
<script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../../view/admin/plugins/toastr/toastr.min.js"></script>

<?php
$mensaje_editar = $mensaje_editar ?? ''; // Asegura que $mensaje_editar esté definido
$msj_eliminar = $msj_eliminar ?? ''; // Asegura que $mensaje_editar esté definido
?>
<script>
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            width: '80%',
            customClass: {
                container: 'mi-clase-personalizada'
            }


        });

        $('.swalDefaultSuccess').click(function () {
            Toast.fire({
                icon: 'success',
                title: '<?php echo $mensaje_editar; ?>'

            })
        });
        $('.swalDefaultInfo').click(function () {
            Toast.fire({
                icon: 'info',
                title: '<?php echo $msj_eliminar; ?>'
            })
        });
        $('.swalDefaultError').click(function () {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultWarning').click(function () {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultQuestion').click(function () {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Verificar si la variable $mensaje_editar está definida
        <?php if (isset($mensaje_editar) && !empty($mensaje_editar)): ?>
            // Simular un clic en el botón para activar el SweetAlert
            $('#btnSuccess').click();
        <?php endif; ?>
        <?php if (isset($msj_eliminar) && !empty($msj_eliminar)): ?>
            // Simular un clic en el botón para activar el SweetAlert

            console.log('entro');
            $('#btnInfo').click();



        <?php endif; ?>


    });
</script>
<!-- ALERTAS DE CONFIRMACION -->


<script>
    // PARA FORMULARIOS O MODALES
    $(document).ready(function () {
        // Escuchar el click del botón "Pagar"
        $('#btnPagar').click(function (e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto

            // Mostrar la alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede revertir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, pagar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                // Si el usuario confirma, enviar el formulario
                if (result.isConfirmed) {
                    $('#formPagar').submit(); // Enviar el formulario
                }
            });
        });

    });
    // PARA ELEMENTOS CREADOS CON PHP 
    echo '<a href="#" onclick="confirmarEliminarUsuario(\''. 'controller_eliminar_usuario.php?id_usuario='.$usuario['id']. '&tipo_usuario='.$tipo_usuario. '\')" class="btn btn-danger" id="desactivarUsuario">';
    function confirmarEliminarUsuario(url) {
        Swal.fire({
            title: "¿Estás seguro de inactivar el usuario?",
            text: "Esto podría afectar sus cursos activos",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, inactivar",
            cancelButtonText: "Cancelar",
            reverseButtons: true,
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
<script class="alertas-opcionales">
    //     $('.toastrDefaultSuccess').click(function() {
    //         toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    //     });
    //     $('.toastrDefaultInfo').click(function() {
    //         toastr.info('informacion relevante.', '', {
    //             timeOut: 30000
    //         });
    //     });
    //     $('.toastrDefaultError').click(function() {
    //         toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    //     });
    //     $('.toastrDefaultWarning').click(function() {
    //         toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    //     });

    //     $('.toastsDefaultDefault').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultTopLeft').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             position: 'topLeft',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultBottomRight').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             position: 'bottomRight',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultBottomLeft').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             position: 'bottomLeft',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultAutohide').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             autohide: true,
    //             delay: 750,
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultNotFixed').click(function() {
    //         $(document).Toasts('create', {
    //             title: 'Toast Title',
    //             fixed: false,
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultFull').click(function() {
    //         $(document).Toasts('create', {
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             icon: 'fas fa-envelope fa-lg',
    //         })
    //     });
    //     $('.toastsDefaultFullImage').click(function() {
    //         $(document).Toasts('create', {
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             image: '../../dist/img/user3-128x128.jpg',
    //             imageAlt: 'User Picture',
    //         })
    //     });
    //     $('.toastsDefaultSuccess').click(function() {
    //         $(document).Toasts('create', {
    //             class: 'bg-success',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultInfo').click(function() {
    //         $(document).Toasts('create', {
    //             class: 'bg-info',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultWarning').click(function() {
    //         $(document).Toasts('create', {
    //             class: 'bg-warning',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultDanger').click(function() {
    //         $(document).Toasts('create', {
    //             class: 'bg-danger',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    //     $('.toastsDefaultMaroon').click(function() {
    //         $(document).Toasts('create', {
    //             class: 'bg-maroon',
    //             title: 'Toast Title',
    //             subtitle: 'Subtitle',
    //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //         })
    //     });
    // });
</script>