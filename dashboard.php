<?php
session_start();
include 'koneksi.php';
// Periksa apakah pengguna telah login
if (!isset($_SESSION['login'])) {
    header("Location: signin.php");
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
                <a class="mycart">
                    <p>My cart</p>
                </a>
                <a class="totalcart" href="">Total: Rp.</a>
                <div class="arrow"><a href="mycart.php"><img src="assets/arrow.png"></div></a>
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
                        <div class="input-group-btn">
                            <button id="down" class="lbtn btn-default"
                                onclick="down('<?= $row['MenuID']; ?>', '0')"><span
                                    class="glyphicon glyphicon-minus"></span>-</button>
                        </div>
                        <input type="text" id="myNumber<?= $row['MenuID']; ?>" class="form-control input-number"
                            value="0" />
                        <div class="input-group-btn">
                            <button id="up" class="rbtn btn-default" onclick="up('<?= $row['MenuID']; ?>', '10')"><span
                                    class="glyphicon glyphicon-plus"></span>+</button>

                        </div>
                    </div>
                    <div class="addtocartbox">
                        <button id="addtocart" type="submit">Add</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>



        </div>
        <div class="footer"></div>
    </div>
    <script src="js/incrementbutton.js"></script>
</body>

</html>