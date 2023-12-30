<?php
function calculateTotalCart()
{
    if (isset($_SESSION['cart_item'])) {
        $total = 0;

        foreach ($_SESSION['cart_item'] as $item) {
            // Periksa apakah nilai harga dan kuantitas adalah numerik
            if (is_numeric($item['price']) && is_numeric($item['quantity'])) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return $total;
    }

    return 0;
}
?>
