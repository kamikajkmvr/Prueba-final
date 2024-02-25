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

    $messages = file_exists('messages.txt') ? file('messages.txt', FILE_IGNORE_NEW_LINES) : [];
    array_unshift($messages, json_encode($newMessage));
    file_put_contents('messages.txt', implode("\n", $messages));

    header("Location: index.php"); 
}
?>
