<?php
$messages = file_exists('messages.txt') ? file_get_contents('messages.txt') : '';
$messagesArray = json_decode($messages, true) ?: [];

foreach ($messagesArray as $message) {
    echo "<div class='message'>";
    echo "<p><strong>" . $message['username'] . "</strong> - " . $message['created_at'] . "</p>";
    echo "<p>" . $message['message'] . "</p>";
    echo "</div>";
}
?>
