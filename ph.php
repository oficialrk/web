<?php
// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Aquí puedes enviar el ticket por correo electrónico o guardarlo en una base de datos
    // Por ejemplo, enviar un correo electrónico de notificación al administrador
    
    // Redirigir de vuelta a la página de tickets con un mensaje de éxito
    header("Location: tickets.php?success=true");
    exit;
}
?>
