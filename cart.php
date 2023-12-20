<?php
session_start();
include 'koneksi.php';

if (isset($_POST['quantity'])) {
    $menuID = $_POST['menu_id'];
    $menuName = $_POST['menu_name'];
    $menuPrice = $_POST['menu_price'];
    $quantity = $_POST['quantity'];

    // Create an item array with product details and quantity
    $itemArray = array(
        $menuID => array(
            'name' => $menuName,
            'price' => $menuPrice,
            'quantity' => $quantity
        )
    );

    // Check if the cart is not empty
    if (!empty($_SESSION["cart_item"])) {
        // If the product is already in the cart, update the quantity
        if (array_key_exists($menuID, $_SESSION["cart_item"])) {
            $_SESSION["cart_item"][$menuID]["quantity"] += $quantity;
        } else {
            // If the product is not in the cart, merge the item array with the cart
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
    } else {
        // If the cart is empty, set the cart to the item array
        $_SESSION["cart_item"] = $itemArray;
    }
}

// Redirect back to the dashboard or any other page as needed
header("Location: dashboard.php");
exit();
?>
