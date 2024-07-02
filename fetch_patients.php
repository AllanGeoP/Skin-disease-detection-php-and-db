<?php
include 'connection.php'; // Ensure you have a file named connection.php with your database connection setup

$doctor_id = $_GET['doctor_id']; // Get the doctor's ID from the query parameter

// Prepare SQL to fetch patient details who have messaged this particular doctor
$sql = "SELECT DISTINCT id, name, address, email, phonenumber, height, weight, age, gender
        FROM (
            SELECT r.id, r.name, r.address, r.email, r.phonenumber, r.height, r.weight, r.age, r.gender
            FROM register r
            JOIN messages m ON r.id = m.sender_id
            WHERE m.receiver_id = ? AND m.sender_role = 'patient'
            UNION
            SELECT r.id, r.name, r.address, r.email, r.phonenumber, r.height, r.weight, r.age, r.gender
            FROM register r
            JOIN messages m ON r.id = m.receiver_id
            WHERE m.sender_id = ? AND m.sender_role = 'patient'
        ) AS patients
        ORDER BY id ASC"; // Now ordering by 'id' after the UNION

$stmt = $con->prepare($sql);
if (!$stmt) {
    echo "Error in statement preparation: " . $con->error;
    exit();
}

$stmt->bind_param("ii", $doctor_id, $doctor_id);
$stmt->execute();
$result = $stmt->get_result();

$patients = [];
while ($row = $result->fetch_assoc()) {
    $patients[] = $row; // Collect each patient's details
}

echo json_encode($patients); // Output the list of patients as JSON

$stmt->close();
$con->close();
?>
