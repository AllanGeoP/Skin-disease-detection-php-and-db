<?php
include 'connection.php';

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$sender_role = $_POST['sender_role'];  // 'doctor' or 'patient'
$message = $_POST['message'];

// Prepare and bind
$stmt = $con->prepare("INSERT INTO messages (sender_id, receiver_id, sender_role, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiss", $sender_id, $receiver_id, $sender_role, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
