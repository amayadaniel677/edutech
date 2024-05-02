plantilla para alertas.

<!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="../../../view/admin/plugins/toastr/toastr.min.css">

 <style>
        .table-responsive {
            max-height: 400px;
            /* Ajusta este valor según tus necesidades */
            overflow-y: auto;
            /* Habilita el desplazamiento vertical */
        }

        .mi-clase-personalizada .swal2-popup {
            font-size: 16px !important;
            height: 70px !important;
            /* ejemplo para tati */

        }

        .swal2-popup h2 {
            margin-top: 8px !important;
            font-size: 18px !important;
        }
    </style>
  <link rel="icon" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />   <!-- necesario para el tamaño de mensajes alerta  -->


    <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                                    Launch Success Toast
                                </button>
                                <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
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
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 400000,
                    width: '80%',
                    customClass: {
                        container: 'mi-clase-personalizada'
                    }
    
                
                });
    
                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title:'<?php echo $mensaje_editar; ?>'
                        
                    })
                });
                $('.swalDefaultInfo').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: '<?php echo $msj_eliminar; ?>'
                    })
                });
                $('.swalDefaultError').click(function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultWarning').click(function() {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultQuestion').click(function() {
                    Toast.fire({
                        icon: 'question',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Verificar si la variable $mensaje_editar está definida
                <?php if (isset($mensaje_editar) && !empty($mensaje_editar)) : ?>
                    // Simular un clic en el botón para activar el SweetAlert
                    $('#btnSuccess').click();
                <?php endif; ?>
                <?php if (isset($msj_eliminar) && !empty($msj_eliminar)) : ?>
                    // Simular un clic en el botón para activar el SweetAlert
                    
                 console.log('entro');
                    $('#btnInfo').click();
    
                   
                    
                <?php endif; ?>
               
                
            });
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
