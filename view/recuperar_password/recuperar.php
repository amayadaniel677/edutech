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
                    <input type="number" id="dni" name="dni" class="form-control" placeholder="Identificacion">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                <button type="submit" class="btn btn-success btn-block">Regresar</button>

            </form>
        </div>
    </div>

</body>

</html>