<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Incidentes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style type="text/css">
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.container {
    width: 80%;
    margin: auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h1 {
    text-align: center;
}
form {
    margin-bottom: 20px;
}
label {
    display: block;
    margin: 10px 0 5px;
}
input[type="date"], select, textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
button {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table, th, td {
    border: 1px solid #ddd;
}
th, td {
    padding: 10px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
}
button.action-btn {
    background-color: #dc3545;
}
button.action-btn:hover {
    background-color: #c82333;
}
    </style>
    <div class="container">
        <h1>Registro de Incidentes</h1>

        <form method="post">
            <input type="hidden" name="id" id="incidentId">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="Accidente Automovilístico">Accidente Automovilístico</option>
                <option value="Accidente de Motocicleta">Accidente de Motocicleta</option>
            </select>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4"></textarea>
            <button type="submit" name="action" value="add">Agregar Incidente</button>
            <button type="submit" name="action" value="update">Actualizar Incidente</button>
        </form>

        <h2>Incidentes Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="incidentTableBody">
                <!-- Aquí se llenará con los datos desde PHP -->
            </tbody>
        </table>
    </div>
    <script src="scripts.js"></script>
</body>
</html>

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

if(isset($_POST['action'])){

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
    $sql = "DELETE Incidentes SET eliminado=TRUE WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
?>