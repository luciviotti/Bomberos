<?php
$servername = "localhost";
$username = "root";
$password = "";  // Si no tienes contraseña, déjalo en blanco
$dbname = "bomberos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$action = $_POST['action'];

if ($action === 'add') {
    $sql = "INSERT INTO Incidentes (fecha, tipo, descripcion) VALUES ('$fecha', '$tipo', '$descripcion')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif ($action === 'update') {
    $sql = "UPDATE Incidentes SET fecha='$fecha', tipo='$tipo', descripcion='$descripcion' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif ($action === 'delete') {
    $sql = "UPDATE Incidentes SET eliminado=TRUE WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if ($action === 'add') {
    $stmt = $conn->prepare("INSERT INTO Incidentes (fecha, tipo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fecha, $tipo, $descripcion);
    if ($stmt->execute()) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


// Cerrar conexión
$conn->close();

// Redirigir al usuario de vuelta a la página principal
header("Location: index.php");
exit();
?>