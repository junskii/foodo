<?php
session_start();
include 'koneksi.php';

// Check if the user is logged in
if (!isset($_SESSION['login'])) {
    header("Location: signin.php");
    exit;
}

$fname = "Guest"; // Default value if user data retrieval fails
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
    $query = "SELECT FirstName FROM Customers WHERE CustomerID = ?";

    // Using prepared statement to prevent SQL injection
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $userData = $result->fetch_assoc()) {
        $fname = $userData['FirstName'];
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/mycart.css">
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
        <!-----------------orderdetails----------------->
        <div class="orderdetails">
            <div class="navlink">
                <a href="dashboard.php">Home /</a>
                <a href="mycart.php">My Cart /</a>
                <a href="#"><strong>Payment</strong></a>
            </div>

        </div>

    </div>
    <!-----------------Qris----------------->
    <div class="qris">
        <p class="orderlabel">Qris </p>


    </div>

    <!-----------------Transfer----------------->
    <div class="transfer">
        <p class="orderlabel">Bank Transfer</p>


    </div>
    <!-----------------Cash----------------->
    <div class="cash">
        <p class="orderlabel">Cash</p>


    </div>
</body>

</html>