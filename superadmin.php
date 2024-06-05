<!-- insertar un superadmin en la tabla people -->
<?php
$contraseña = password_hash("kepleraulasuperadmin2024", PASSWORD_DEFAULT);
$fecha='2024-01-01';
$conexion = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");

$sql="INSERT INTO `people` ( `name`,`lastname`,`phone`,`city`,`address`,`birthdate`,`sex`,`dni_type`,`dni`, `email`, `password`, `rol`, `status`) 
                    VALUES ('Super', 'Admin', '0000000000', 'Sogamoso', 'Cra 14 #17-42', '2024-01-01', 'M', 'NA', '0000000000','kepler@gmail.com', '$contraseña', 'superadmin', 'active')";
$resultado=$conexion->query($sql);
if($resultado){
    echo "Superadmin insertado correctamente";
}else{
    echo "Error al insertar superadmin";
}


?>