// CODIGO DE AGREGAR DETALLE EN MODAL

document.getElementById('btn-reg-user').addEventListener('click', () => {
    Swal.fire({
      title: "¿Estás seguro de registrar el usuario?",
      text: "Este proceso registrará el usuario en la base de datos.",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Registrar Usuario"
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes agregar la lógica para enviar los datos de la venta a la base de datos
        Swal.fire({
          title: "Usuario registrado",
          text: "El usuario se ha registrado exitosamente.",
          icon: "success"
        });
      }  else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: "Acción cancelada",
          text: "El usuario NO se ha registrado",
          icon: "info"
        });
      }
    });
  });