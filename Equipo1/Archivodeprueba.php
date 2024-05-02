<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fecha y Hora Actual en PHP</title>
</head>
<body>
    <h1>Fecha y Hora Actual en PHP</h1>
    <p><?php echo date('d-m-Y H:i:s'); ?></p>

    <h2>Formulario Simple</h2>
    <form method="post">
        <label for="name">Tu nombre:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Enviar</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']); // Sanitizar la entrada para evitar inyecciones de código
            if (!empty($name)) {
                echo "<p>Hola, " . $name . "!</p>";
            } else {
                echo "<p>Por favor, introduce tu nombre.</p>";
            }
        }
    ?>
</body>
</html>
