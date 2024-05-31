<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario de MySQL es diferente
$password = "labaspechuspechus"; // Cambia esto si tienes una contraseña para tu usuario de MySQL
$dbname = "ecobstDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contrasena = $_POST['password'];
$confirm_contrasena = $_POST['confirm-password'];

// Verificar si las contraseñas coinciden
if ($contrasena !== $confirm_contrasena) {
    die("Las contraseñas no coinciden.");
}

// Encriptar la contraseña
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO USUARIO (nombre_usuario, correo_usuario, contrasena_usuario)
VALUES ('$nombre', '$email', '$contrasena_encriptada')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
