document.getElementById("btn-gen-reporte").addEventListener('click', (event) => {
    event.preventDefault(); // Evitar el comportamiento predeterminado del formulario
  
    let timerInterval;
    Swal.fire({
      title: "Cargando reporte, gracias por esperar!",
      html: " <b></b> segundos restantes",
      timer: 3000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
          const remainingTime = Swal.getTimerLeft();
          if (remainingTime >= 0) {
            timer.textContent = `${Math.ceil(remainingTime / 1000)}`;
          }
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log("I was closed by the timer");
      }
    }).then(() => {
      Swal.fire({
        title: "Reporte generado",
        text: "El reporte se ha generado exitosamente.",
        icon: "success"
      });
    });
  });
  