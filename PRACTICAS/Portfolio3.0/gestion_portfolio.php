<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogida y saneamiento de datos
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $asunto = htmlspecialchars(trim($_POST['asunto']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validaciones
    $errores = [];

    // Validar nombre: no vacío y longitud mínima
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    // Validar email: formato correcto
    if (empty($email)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Validar asunto: no vacío
    if (empty($asunto)) {
        $errores[] = "El asunto es obligatorio.";
    }

    // Validar mensaje: no vacío y longitud mínima
    if (empty($mensaje)) {
        $errores[] = "El mensaje es obligatorio.";
    } elseif (strlen($mensaje) < 10) {
        $errores[] = "El mensaje debe tener al menos 10 caracteres.";
    }

    // Si hay errores, mostrar mensajes de error
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        // Procesamiento de datos (por ejemplo, enviar correo o guardar en base de datos)
        echo "<p style='color: green;'>Formulario enviado correctamente.</p>";

        // Ejemplo de envío de correo (necesita configuración adicional en servidor)
        $to = "Timurnator_@outlook.com"; // Cambia esto a tu dirección de correo
        $subject = "Nuevo mensaje de contacto: $asunto";
        $message = "Nombre: $nombre\nCorreo Electrónico: $email\nMensaje:\n$mensaje";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "<p style='color: green;'>Correo enviado con éxito.</p>";
        } else {
            echo "<p style='color: red;'>Error al enviar el correo.</p>";
        }
    }
}
?>
