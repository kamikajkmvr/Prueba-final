<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $message = $_POST['message'];
    $created_at = date("Y-m-d H:i:s");

    $newMessage = [
        'username' => $username,
        'message' => $message,
        'created_at' => $created_at
    ];

    $messages = file_exists('messages.txt') ? file_get_contents('messages.txt') : '';
    $messagesArray = json_decode($messages, true) ?: [];
    array_unshift($messagesArray, $newMessage);

    file_put_contents('messages.txt', json_encode($messagesArray));

    header("Location: index.html"); 
}
?>
