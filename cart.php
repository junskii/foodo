<?php
session_start();

// Fungsi untuk menambah item ke dalam keranjang
function addToCart($menuID, $quantity, $price) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Jika item sudah ada di keranjang, tambahkan jumlahnya
    if (isset($_SESSION['cart'][$menuID])) {
        $_SESSION['cart'][$menuID]['quantity'] += $quantity;
    } else {
        // Jika belum, tambahkan item baru ke keranjang
        $_SESSION['cart'][$menuID] = array(
            'quantity' => $quantity,
            'price' => $price
        );
    }
}

// Fungsi untuk menghitung total harga di keranjang
function calculateTotal() {
    $total = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['quantity'] * $item['price'];
        }
    }

    return $total;
}

// Contoh penggunaan: tambahkan item dengan ID 1, jumlah 2, dan harga 15000
?>
