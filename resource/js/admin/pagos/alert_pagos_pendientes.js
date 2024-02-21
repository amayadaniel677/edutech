document.querySelectorAll('.btn-agregar-pago').forEach(btn => {
    btn.addEventListener('click', () => {
      Swal.fire({
        title: "¿Estás seguro de confirmar el pago?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Confirmar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Pago agregado",
            icon: "success"
          });
        }
      });
    });
  });