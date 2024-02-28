<?php

$servername = "localhost";
$username = "root";
$password = "daniel";  // Reemplaza con tu contraseña
$dbname = "edutech_1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Ejecutar una consulta simple
$sql = "SELECT * FROM areas";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Recorrer los resultados de la consulta
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nombre del área: " . $row["name"] . "<br>";
    }
} else {
    echo "La consulta no devolvió resultados.";
}

// Cerrar la conexión
$conn->close();

?>
