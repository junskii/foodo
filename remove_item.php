<?php
session_start();
include 'koneksi.php';

// Check if the item ID is provided in the query parameters
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Check if the item exists in the cart
    if (isset($_SESSION['cart_item'][$itemId])) {
        // Remove the item from the cart
        unset($_SESSION['cart_item'][$itemId]);

        // Redirect back to the cart page
        header("Location: mycart.php");
        exit;
    }
}

// If the item ID is not provided or not found in the cart, redirect to the cart page
header("Location: mycart.php");
exit;
