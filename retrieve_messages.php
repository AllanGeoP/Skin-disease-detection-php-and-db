<?php
include 'connection.php';  // Ensure you have a file named db.php with your database connection setup

$sender_id = $_GET['sender_id'];
$receiver_id = $_GET['receiver_id'];

// Prepare SQL to fetch messages
// The SQL query retrieves messages where the current user is either sender or receiver,
// and pairs it with the corresponding other user, ensuring conversation consistency.
$sql = "SELECT sender_id, receiver_id, sender_role, message, timestamp 
        FROM messages 
        WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)
        ORDER BY timestamp ASC"; // Ordering by timestamp to maintain conversation order

$stmt = $con->prepare($sql);
$stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);

$stmt->close();
$con->close();
?>
