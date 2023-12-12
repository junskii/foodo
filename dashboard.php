<?php
session_start();
include 'koneksi.php';
// Periksa apakah pengguna telah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil data pengguna dari database berdasarkan ID yang disimpan di sesi
$userID = $_SESSION['user_id'];
$result = mysqli_query($mysqli, "SELECT FirstName FROM Customers WHERE CustomerID = $userID");

if ($result) {
    $userData = mysqli_fetch_assoc($result);
    $fname = $userData['FirstName'];
} else {
    // Handle error jika tidak dapat mengambil data pengguna
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
                <div class="box">
                    <a href="#food">food</a>
                    <a href="beverage">beverage</a>
                </div>
            </div>
            <div class="bot">
                <div class="box">
                    <div class="mycart">
                        <a href="">
                            <p>mycart</p>
                        </a>
                        <a href="">
                        </a>
                    </div>
                    <div class="price">
                        <a href="">RP 13000</a>
                    </div>
                </div>
            </div>
        </div>

        <!-----------------main----------------->
        <div class="main">
            <div class="search">
                <input type="text">
            </div>
            <h1 class="food">Food</h1>
            <?php while ($row = mysqli_fetch_assoc($menuResult)): ?>
            <div class="foodcontainer">
                <div class="menuimg">
                    <div class="menubackground">
                        <img src="<?= $row['Gambar']; ?>">
                    </div>
                </div>

                <div class="menuinfo">
                    <div class="menutitle">
                        <h4>
                            <?= $row['NamaMenu']; ?>
                        </h4>
                    </div>
                    <div class="menudesc">
                        <?= $row['Deskripsi']; ?>
                    </div>
                    <div class="menuprice">Rp.
                        <?= $row['Harga']; ?>
                    </div>
                    <div class="menuadd">Add</div>
                </div>

            </div>
            <?php endwhile; ?>


        </div>
        <div class="footer"></div>
    </div>
</body>

</html>