<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add item to cart
    $_SESSION['cart'][] = [
        'name' => $productName,
        'price' => $productPrice
    ];

    // Respond with JSON or any data needed (optional)
    echo json_encode(['success' => true, 'message' => 'Product added to cart']);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>