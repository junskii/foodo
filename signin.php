<?
session_start();
include 'koneksi.php';

$_SESSION['login'] = true;
$_SESSION['user_id'] = $row['CustomerID'];
$_SESSION['user_email'] = $row['Email']; // Menyimpan email ke dalam session


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | foodo</title>
    <link rel="stylesheet" href="style/signin.css">
    <link rel="icon" href="assets/logoonly.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="assets/logosidered.png" alt="logo">
            </div>
        </div>
        <!-- /*--------------------loginform--------------------*/ -->

        <div class="loginform">
            <h1>Login<span id="titik">.</span></h1>
            <form action="signinproses.php" method="post">
                <div class="text-field">
                    <label for="email">Email:
                        <br>
                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Your Email"
                            required>
                    </label>
                </div>
                <br>
                <div class="text-field">
                    <label for="password">Password:
                        <br>
                        <input id="password" type="password" name="password" placeholder="Your Password" title="Minimum 6 characters at 
                                                        least 1 Alphabet and 1 Number"
                            pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
                    </label>
                </div>
                <br><br>
                <button id="loginbutton" name="submit" type="submit">Login</button>
            </form>
            <div class="signuparea">
                <p class="daftarakun">Don't have an account yet?<a href="signup.php"> Click here!</a></p>
            </div>
        </div>
        <!-- /*--------------------pictarea--------------------*/ -->
        <div class="pict">
            <div class="loginpic">
                <img src="assets/loginpic.jpg">
            </div>
        </div>
    </div>
</body>

</html>