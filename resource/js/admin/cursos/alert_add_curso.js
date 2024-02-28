document.getElementById('btn-add-curso').addEventListener('click', () => {
    Swal.fire({
      title: "¿Estás seguro de agregar el curso?",
      text: "Este proceso registrará el curso en la base de datos.",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Agregar"
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes agregar la lógica para enviar los datos de la venta a la base de datos
        Swal.fire({
          title: "Curso Agregado",
          text: "El curso se ha agregado exitosamente. Ahora puedes verlo en el catalogo. ",
          icon: "success"
        });
      }  else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: "Acción cancelada",
          text: "El curso NO se ha registrado",
          icon: "info"
        });
      }
    });
  });