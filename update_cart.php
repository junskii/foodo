<?php
session_start();

if (isset($_POST['menuID']) && isset($_POST['quantity'])) {
    $menuID = $_POST['menuID'];
    $quantity = $_POST['quantity'];

    // Update sesi dengan informasi menu yang baru
    if (isset($_SESSION['cart'][$menuID])) {
        $_SESSION['cart'][$menuID]['quantity'] = $quantity;
    }
}
?>
