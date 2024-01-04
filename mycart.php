<?php
session_start();
include 'koneksi.php';

// Check if the user is logged in
if (!isset($_SESSION['login'])) {
    header("Location: signin.php");
    exit;
}

// Function to calculate total cart value
// Function to calculate total cart value
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


// Fetch user data
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
    <title>Dashboard | foodo</title>
    <link rel="stylesheet" href="style/mycart.css">
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
                <a href="#"><strong>My Cart</strong></a>
            </div>
            <p class="orderlabel">Order Details</p>

            <!-- Menampilkan daftar item di keranjang -->
            <div class="cart-items">
                <h2>My Cart</h2>
                <ul class="cart-list">
                    <?php if (isset($_SESSION['cart_item'])) : ?>
                        <?php foreach ($_SESSION['cart_item'] as $item) : ?>
                            <?php
                            // Assuming $mysqli is your database connection
                            $itemId = $item['id'];
                            $itemResult = mysqli_query($mysqli, "SELECT * FROM Menu WHERE MenuID = $itemId");

                            if ($itemResult && mysqli_num_rows($itemResult) > 0) {
                                $menuItem = mysqli_fetch_assoc($itemResult);
                            ?>
                                <li class="cart-item">
                                    <div class="item-details">
                                        <h3 class="item-name">
                                            <?php echo $menuItem['NamaMenu']; ?>
                                        </h3>
                                        <p class="item-description">
                                            <?php echo $menuItem['Deskripsi']; ?>
                                        </p>
                                    </div>
                                    <div class="item-controls">
                                        <span class="item-quantity">Quantity:
                                            <?php echo $item['quantity']; ?>
                                        </span>
                                        <span class="item-price">Price: Rp.
                                            <?php echo number_format($item['price'], 0, ',', '.'); ?>
                                        </span>
                                        <span class="remove-item"><a href="remove_item.php?id=<?php echo $item['id']; ?>">Remove</a></span>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="empty-cart">Your cart is empty.</p>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Menampilkan total cart -->
            <div class="total-cart">
                <p>Total: Rp.
                    <?php echo number_format(calculateTotalCart(), 0, ',', '.'); ?>
                </p>
            </div>

            <div class="footer"></div>
        </div>

        <div class="payment">
            <label for="payment-method">Payment Method:</label>
            <select id="payment-method" class="payment-dropdown" onchange="togglePaymentSections()">
                <option value="">Select Payment Method</option>
                <option value="qris">QRIS</option>
                <option value="bank-transfer">Bank Transfer</option>
            </select>

            <!-- qris page -->
            <div class="qris hidden">
                <div class="box">
                    <div class="qrframe">
                        <img src="image/qrfoodo.png" id="qrcode">
                    </div>
                </div>
                    <div>
                        <input href="#" type="submit" value="I Have Paid the Bill" id="paidbutton">
                    </div>
            </div>

            <!-- bank page -->
            <div class="bank hidden">
                <div class="top">
                    <div class="bank-name">
                        <p>BCA</p>
                        <p>Mandiri</p>
                        <p>BSI</p>
                        <p>BNI</p>
                        <p>BRI</p>
                    </div>
                    <div class="norek">
                        <p>12345678</p>
                        <p>1234567890123</p>
                        <p>1234567890</p>
                        <p>1234567890</p>
                        <p>1234567890</p>
                    </div>
                    <div class="nama-kantin">
                        <p>KANTIN FTI</p>
                        <p>KANTIN FTI</p>
                        <p>KANTIN FTI</p>
                        <p>KANTIN FTI</p>
                        <p>KANTIN FTI</p>
                    </div>
                </div>
                <div>
                    <div>
                        <a href="success.php" class="paidbutton"><p>I Have Paid the Bill</p></a>
                    </div>
                </div>
                <!-- <div class="bot">
                    <a class="paidbutton" href="success.php">
                        <p>I Have Paid The Bill</p>
                    </a>
                </div> -->
            </div>
        </div>

        <script>
            function togglePaymentSections() {
                var selectedOption = document.getElementById("payment-method").value;
                var qrisSection = document.querySelector(".qris");
                var bankSection = document.querySelector(".bank");

                // Hide both sections initially
                qrisSection.classList.add("hidden");
                bankSection.classList.add("hidden");

                // Show/hide sections based on selected option
                if (selectedOption === "qris") {
                    qrisSection.classList.remove("hidden");
                } else if (selectedOption === "bank-transfer") {
                    bankSection.classList.remove("hidden");
                }
            }
            // Initial hiding of both sections
            document.addEventListener("DOMContentLoaded", function() {
                togglePaymentSections();
            });
        </script>
    </div>
</body>

</html>