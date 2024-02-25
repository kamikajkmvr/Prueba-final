<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foro de Animales</title>
</head>
<body>

<h1>Foro de Animales</h1>

<form action="post_message.php" method="post">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" required>
    <br>
    <label for="message">Mensaje:</label>
    <textarea name="message" rows="4" required></textarea>
    <br>
    <input type="submit" value="Publicar">
</form>

<h2>Mensajes:</h2>
<?php
$messages = file_exists('messages.txt') ? file('messages.txt', FILE_IGNORE_NEW_LINES) : [];

foreach ($messages as $message) {
    
    $messageData = json_decode($message, true);
    echo "<div>";
    echo "<p><strong>" . $messageData['username'] . "</strong> - " . $messageData['created_at'] . "</p>";
    echo "<p>" . $messageData['message'] . "</p>";
    echo "</div>";
}
?>

</body>
</html>