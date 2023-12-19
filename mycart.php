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

            // Tampilkan item-item di keranjang
           // Tampilkan item-item di keranjang
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $menuID => $item) {
        $menuResult = mysqli_query($mysqli, "SELECT * FROM Menu WHERE MenuID = $menuID");

        // Check if the query was successful and if it returned any rows
        if ($menuResult && mysqli_num_rows($menuResult) > 0) {
            $menuData = mysqli_fetch_assoc($menuResult);

            echo '<div class="foodcontainer">';
            echo '<div class="menuimg">';
            echo '<div class="menubackground">';
            echo '<img src="uploads/menu/' . $menuData['Gambar'] . '">';
            echo '</div>';
            echo '</div>';
            echo '<div class="menutitle">';
            echo '<h2>' . $menuData['NamaMenu'] . '</h2>';
            echo '</div>';
            echo '<div class="menudesc">' . $menuData['Deskripsi'] . '</div>';
            echo '<div class="price">';
            echo '<div class="menuprice">Rp.' . $menuData['Harga'] * $item['quantity'] . '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            // Handle the case when menu data is not found
            echo '<div class="foodcontainer">';
            echo '<p>Menu with ID ' . $menuID . ' not found.</p>';
            echo '</div>';
        }
    }
}

            ?>
            
            <div class="footer"></div>
        </div>

        <!-----------------payment----------------->
        <div class="payment">p
            
        </div>

        
        <div class="footer"></div>
    </div>
</body>

</html>