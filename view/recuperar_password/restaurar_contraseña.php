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
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $key => $error) : ?>
            <div class="alert alert-<?php echo ($key == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">

                <h2>Restaurar Contraseña</h2>
                <div class="form-group">
                    <label for="dni">Identificacion: </label>
                    <input type="number" id="dni" name="dni" class="form-control" placeholder="Identificacion" oninput="validateInput(this)" onkeydown="preventInvalidKeys(event)">
                </div>
                <div class="form-group">
                    <label for="password">Nueva contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="contraseña">
                </div>
                <div class="form-group">
                    <label for="confir_password">Confirmar Contraseña: </label>
                    <input type="password" id="confir_password" name="confir_password" class="form-control" placeholder=" confirmar contraseña">
                </div>

                <button type="submit" class="btn btn-success btn-block">Restaurar</button>

            </form>
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