<?php
// Conexión a la base de datos
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ecg";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Recibir los datos enviados por la placa ESP8266
$ecg_data = $_POST["ecg_data"];

// Guardar los datos en la base de datos
$sql = "INSERT INTO datos_ecg (valor) VALUES ('$ecg_data')";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>
