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

$menuResult = mysqli_query($mysqli, "SELECT * FROM Menu");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | foodo</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>

<body>
    <div class="container">
        <!-----------------header----------------->
        <div class="item header">
            <div class="logo">
                <a href="dashboard.php"><img src="assets/logosidered.png" alt="logo"></a>
            </div>
            <div class="top-button">
                <a href="#"><img src="assets/order.png"></a>
                <a href="profile.php"><img src="assets/user.png"></a>
            </div>

        </div>
        <!-----------------subheader----------------->
        <div class="item subheader">
            <div class="subheaderbox">
                <div class="lsubheader">
                    <h1>Bon appétit,</h1>
                    <h1 class="fname">
                        <?php echo $fname; ?>
                    </h1>

                </div>
                <div class="rsubheader">
                    <h4>Currently enjoying meal at</h4>
                    <h4 class="kantinfti">Kantin Terpadu FTI UII</h4>
                    <h4>Your favorite meals, now in the palm of your hand</h4>
                </div>
            </div>
        </div>
        <!-----------------nav----------------->
        <div class="navbar">
            <div class="top">
                <a class="food" href="#food">food</a>
                <a class="beverage" href="beverage">beverage</a>
            </div>
            <div class="bot">
                <a class="mycart" href="mycart.php">
                    <p>My cart</p>
                </a>
                <a class="totalcart" href="mycart.php">
                    Total: Rp.
                    <?= number_format(calculateTotalCart(), 0, ',', '.'); ?>
                </a>
                <div class="arrow"><a href="mycart.php"><img src="assets/arrow.png"></div></a>
            </div>
        </div>

        <!-----------------main----------------->
        <div class="main">
            <div class="search">
                <input class="searchbar" type="text">
            </div>
            <h1 class="food">Food</h1>
            <?php while ($row = mysqli_fetch_assoc($menuResult)): ?>
            <form action="cart.php" method="post">
                    <input type="hidden" name="menu_id" value="<?php echo $row['ID']; ?>">
                    <input type="hidden" name="menu_name" value="<?php echo $row['NamaMenu']; ?>">
                    <input type="hidden" name="menu_price" value="<?php echo $row['Harga']; ?>">
                    <div class="foodcontainer">
                        <div class="menuimg">
                            <div class="menubackground">
                                <img src="<?= $row['Gambar']; ?>">
                            </div>
                        </div>
                        <div class="menutitle">
                            <h4>
                                <?= $row['NamaMenu']; ?>
                            </h4>
                        </div>
                        <div class="menudesc">
                            <?= $row['Deskripsi']; ?>
                        </div>
                        <div class="price">
                            <div class="menuprice">Rp.
                                <?= $row['Harga']; ?>
                            </div>
                            <div class="input-group">
                                <input type="text" name="quantity" class="quantity" value="1" />
                                <input type="submit" class="form-control input-number" value="Add to Cart">
                            </div>
                        </div>
                    </div>
                </form>
            <?php endwhile; ?>






        </div>
        <div class="footer"></div>
    </div>
    <script src="js/incrementbutton.js"></script>
</body>

</html>