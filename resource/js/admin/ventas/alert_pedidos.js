
                      document.getElementById('btn-eliminar').addEventListener('click', function(){Swal.fire({
                        title: "Estas seguro de eliminar el pedido?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "si!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                            title: "Pedido eliminado!",
                            icon: "success"
                            });
                        }
                        });
                        });
