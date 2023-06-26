<?php
// Conexión a la base de datos
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ecg";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Consulta SQL para obtener los datos del sensor ECG
$sql = "SELECT * FROM datos_ecg ORDER BY timestamp DESC LIMIT 18";

// Ejecutar la consulta SQL y guardar los resultados en un arreglo asociativo
$resultado = mysqli_query($conn, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
  $datos[] = $fila;
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($datos);
?>
