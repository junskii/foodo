<?php
session_start();
include 'koneksi.php';

// Check if the user is logged in
if (!isset($_SESSION['login'])) {
    header("Location: signin.php");
    exit;
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
    <title>Success | foodo</title>
    <link rel="stylesheet" href="style/success.css">
    <script src="js/incrementbutton.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-----------------header----------------->
        <div class="item header">
            <div class="logo">
                <img src="assets/logosidered.png" alt="logo">
            </div>
            <div class="top-button">
                <!-- <a href="#"><img src="assets/order.png"></a> -->
                <a href="profile.php"><img src="assets/user.png"></a>
            </div>

        </div>
        <!-----------------subheader----------------->
        <div class="item subheader">
            <div class="subheaderbox">
                <div class="lsubheader">
                    <h1>Bon appétit,</h1>
                    <h1 class="fname">
                        <?php echo $fname ?>
                    </h1>

                </div>
                <div class="rsubheader">
                    <h4>Currently enjoying meal at</h4>
                    <h4 class="kantinfti">Kantin Terpadu FTI UII</h4>
                    <h4>Your favorite meals, now in the palm of your hand</h4>
                </div>
            </div>
        </div>
        <!-----------------paymentcomplete----------------->
        <div class="orderdetails">
            <div class="navlink">
                <a href="dashboard.php">Home /</a>
                <a href="mycart.php">My Cart /</a>
                <a href="#"><strong>Complete</strong></a>
            </div>
            <div class="itemtengah">
                <img src="assets/logoonly.png" id="logotengahh">
                <p>Payment Successful. Please wait for your order to be served patiently.</p>
            </div>
        </div>   
</body>

</html>