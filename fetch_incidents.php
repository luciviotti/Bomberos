<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bomberos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM Incidentes WHERE eliminado = FALSE";
$result = $conn->query($sql);

$incidents = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $incidents[] = $row;
    }
}

$conn->close();

// Convertir los datos a JSON y devolver
echo json_encode($incidents);
?>