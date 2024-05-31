<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "labaspechuspechus"; 
$dbname = "ecobstDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("<div class='message error'>Conexión fallida: " . $conn->connect_error . "</div>");
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contrasena = $_POST['password'];
$confirm_contrasena = $_POST['confirm-password'];

// Verificar si las contraseñas coinciden
if ($contrasena !== $confirm_contrasena) {
    echo "<div class='message error'>Las contraseñas no coinciden.</div>";
    exit();
}

// Verificar si el correo ya existe
$sql = "SELECT * FROM USUARIO WHERE correo_usuario = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='message error'>Ya existe un usuario con ese correo.</div>";
    exit();
}


// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO USUARIO (nombre_usuario, correo_usuario, contrasena_usuario)
        VALUES ('$nombre', '$email', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='message success'>Registro exitoso</div>";
} else {
    echo "<div class='message error'>Error al registrar, contacte a soporte.</div>";
}

// Cerrar conexión
$conn->close();
?>
