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
$phonenumber = $customer_data['NomorTelepon']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | foodo</title>
    <link rel="stylesheet" href="style/profile.css">
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
                <a href="dashboard.html">Home</a> / <a href="#">Profile</a>
            </div>
            <h1 class="Profile">Profile</h1>

            <!-----------------formprofile----------------->
            <form method="post" action="profileproses.php">
                <div class="text-field">
                    <label for="firstname">First Name
                        <br>
                        <input name="fname" type="text" autocomplete="off" placeholder="Enter your new name" value="<?php echo $first_name ?>" required>
                    </label>
                </div>
                <br>
                <div class="text-field">
                    <label for="last name">Last Name
                        <br>
                        <input name="lname" type="text" autocomplete="off" placeholder="Enter your new email" value="<?php echo $last_name ?>" required>
                    </label>
                </div>
                <br>
                <div class="text-field">
                    <label for="email">Email
                        <br>
                        <input name="email" type="text" autocomplete="off" placeholder="Enter your new password" value="<?php echo $email ?>" required>
                    </label>
                </div>
                <br>
                <div class="text-field">
                    <label for="password">Password
                        <br>
                        <input name="phonenumber" type="text" autocomplete="off" placeholder="Enter your new password" value="<?php echo $phonenumber ?>"required>
                    </label>
                </div>
                <br><br>
                <input type="submit" value="Save" id="editprofilebutton">
            </form>
        </div>
    </div>
</body>

</html>
