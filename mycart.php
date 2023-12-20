<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['login'])) {
    header("Location: signin.php");
    exit;
}

// Fungsi untuk menghitung total cart
function calculateTotalCart()
{
    $total = 0;

    if (!empty($_SESSION['cart_item'])) {
        foreach ($_SESSION['cart_item'] as $item) {
            $total += (float) $item['price'] * (int) $item['quantity'];
        }
    }

    return $total;
}

$userID = $_SESSION['user_id'];
$result = mysqli_query($mysqli, "SELECT FirstName FROM Customers WHERE CustomerID = $userID");

if ($result) {
    $userData = mysqli_fetch_assoc($result);
    $fname = $userData['FirstName'];
} else {
    $fname = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | foodo</title>
    <link rel="stylesheet" href="style/mycart.css">
    <script src="js/incrementbutton.js"></script>
</head>

<body>
    <div class="container">
        <!-----------------header----------------->
        <div class="item header">
            <div class="logo">
                <img src="assets/logosidered.png" alt="logo">
            </div>
            <div class="top-button">
                <a href="#"><img src="assets/order.png"></a>
                <a href="dashboard.html"><img src="assets/user.png"></a>
            </div>

        </div>
        <!-----------------subheader----------------->
        <div class="item subheader">
            <div class="subheaderbox">
                <div class="lsubheader">
                    <h1>Bon appétit,</h1>
                    <h1 class="fname">Jundi</h1>

                </div>
                <div class="rsubheader">
                    <h4>Currently enjoying meal at</h4>
                    <h4 class="kantinfti">Kantin Terpadu FTI UII</h4>
                    <h4>Your favorite meals, now in the palm of your hand</h4>
                </div>
            </div>
        </div>
       <!-----------------orderdetails----------------->
       <div class="orderdetails">
            <div class="navlink">
                <a href="dashboard.php">Home /</a>
                <a href="#"><strong>My Cart</strong></a>
            </div>
            <p class="orderlabel">Order Details</p>
            
            <!-- Menampilkan daftar item di keranjang -->
            <div class="cart-items">
            <h2>My Cart</h2>
            <?php if (!empty($_SESSION['cart_item'])): ?>
                <ul>
                    <?php foreach ($_SESSION['cart_item'] as $item): ?>
                        <li>
                            <span><?php echo $item['name']; ?></span>
                            <span>Quantity: <?php echo $item['quantity']; ?></span>
                            <span>Price: Rp. <?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>

        <!-- Menampilkan total cart -->
        <div class="total-cart">
            <p>Total: Rp. <?php echo number_format(calculateTotalCart(), 0, ',', '.'); ?></p>
        </div>
            
            <div class="footer"></div>
        </div>


        <!-----------------payment----------------->
        <div class="payment">payment
            
        </div>

        
        <div class="footer"></div>
    </div>
</body>

</html>