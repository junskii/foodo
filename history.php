<?php
include 'koneksi.php';
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Mendapatkan ID user dari sesi
$CustomerID = $_SESSION['user_id'];

// Mendapatkan data karyawan berdasarkan ID
$result = mysqli_query($mysqli, "SELECT * FROM Customers WHERE CustomerID=$CustomerID");
$customer_data = mysqli_fetch_array($result);

// Mendapatkan nilai-nilai individu dari data karyawan
$first_name = $customer_data['FirstName'];
$last_name = $customer_data['LastName'];
$email = $customer_data['Email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History | foodo</title>
    <link rel="stylesheet" href="style/history.css">
    <script src="js/incrementbutton.js"></script>
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
                        <?php echo $first_name; ?>
                    </h1>

                </div>
                <div class="rsubheader">
                    <h4>Currently enjoying meal at</h4>
                    <h4 class="kantinfti">Kantin Terpadu FTI UII</h4>
                    <h4>Your favorite meals, now in the palm of your hand</h4>
                </div>
            </div>
        </div>

        <!-----------------main----------------->
        <div class="main">
            <div class="linkpage">
                <a href="dashboard.php">Home</a> / <a href="#"><strong>History</strong></a>
            </div>
            <h1 class="Profile">History</h1>

            <table>
        <tr>
            <th>Date</th>
            <th>Menu</th>
            <th></th>
        </tr>
        <tr>
            <td>John Doe</td>
            <td>25</td>
            <td>USA</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>30</td>
            <td>Canada</td>
        </tr>
        <tr>
            <td>Mohammed Ali</td>
            <td>22</td>
            <td>India</td>
        </tr>
    </table>

        </div>
    </div>
</body>

</html>