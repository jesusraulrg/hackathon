<?php
$bd_host = "127.0.0.1";
$bd_user = "root";
$bd_pass = "";
$bd_name = "hever";

// Crear conexión
$conn = new mysqli($bd_host, $bd_user, $bd_pass, $bd_name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener la lista de medicamentos
$sql = "SELECT id, nombre, detalles FROM medicamentos";
$result = $conn->query($sql);

$medicamentos = array();

// Recorrer los resultados y almacenar en un array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicamentos[] = $row;
    }
}

// Cerrar la conexión
$conn->close();

// Devolver la lista de medicamentos en formato JSON
echo json_encode($medicamentos);
?>