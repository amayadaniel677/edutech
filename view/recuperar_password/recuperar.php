<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo ($_SESSION['message'] == 'Se ha enviado el correo, revise su cuenta.') ? 'success' : 'danger'; ?>" role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="container">
        <div class="form-container">
            <form action="" method="post">

                <legend>Restaurar Contraseña</legend>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su correo electrónico">
                </div>
                <div class="form-group">
                    <label for="email">Ingrese la identificacion: </label>
                    <input type="number" id="dni" name="dni" class="form-control" placeholder="Identificacion" oninput="validateInput(this)" onkeydown="preventInvalidKeys(event)">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
               

            </form>
            <br>
            <a href="../login_controller.php" class="btn btn-success btn-block">Regresar</a>
        </div>
    </div>
    <!-- Validacion Imputs number -->
<script>
    function validateInput(input) {
        // Asegura que el valor sea mayor o igual a 0
        if (input.value && parseFloat(input.value) < 0) {
            input.classList.add("is-invalid");
        } else {
            input.classList.remove("is-invalid");
        }
    }

    function preventInvalidKeys(event) {
        const input = event.target;
        if (input.type === 'number') {
            // Previene la entrada de 'e', 'E', signos menos y más
            if (event.key === 'e' || event.key === 'E' || event.key === '-' || event.key === '+') {
                event.preventDefault();
            }
        }
    }
    </script>

</body>

</html>