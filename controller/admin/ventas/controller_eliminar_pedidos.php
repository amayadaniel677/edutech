<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_GET['idEliminar'])) {
        $idEliminar = $_GET['idEliminar'];
        
    }
    ?>
    <div class="cuerpo-eliminar">
        <a href="controller_pedidos_pendientes.php?idEliminar=<?php echo $idEliminar;?>">confirmar</a>
        <a href="controller_pedidos_pendientes.php">cancelar</a>
    </div>
   
</body>
</html>