<?php
// Establish connection to the database (Assuming db.php contains secure database connection)
include 'db.php';

// Get JSON data sent from AJAX (assuming it's correctly sent and received)
$data = json_decode(file_get_contents("php://input"), true);

$currentDate = date('Y-m-d');

// Prepare SQL statement using prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO orders (title, price, quantity, subtotal_amount, date, invoice_number, user_id, size) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die('Failed to prepare statement');
}

foreach ($data as $item) {
    // Bind parameters to prevent SQL injection
    $stmt->bind_param("ssssssss", $item["title"], $item["price"], $item["quantity"], 
                      $item["subtotal_amount"], $currentDate, $item["invoice_number"], 
                      $item["user_id"], $item["size"]);

    // Execute the statement
    $stmt->execute();

    // Check for errors in execution
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
        // Handle error (logging, feedback to user, etc.)
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>