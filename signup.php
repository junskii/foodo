<?
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | foodo</title>
</head>

<body>
    <!-- <header>
        <img id="logo_atas" src="/image/foodo_logo.png" alt="logo">
        <img src="/image/Foodo.png" alt="">
    </header> -->
    <main>
        <form method="post" action="signupproses.php">
            <div class="text-field">
                <label for="fname">First Name:
                    <br>
                    <input type="text" id="fname" name="fname" autocomplete="on" placeholder="Your First Name" required>
                </label>
            </div>
            <br>
            <div class="text-field">
                <label for="lname">Last Name:
                    <br>
                    <input type="text" id="lname" name="lname" autocomplete="on" placeholder="Your First Name" required>
                </label>
            </div>
            <br>
            <div class="text-field">
                <label for="email">Email:
                    <br>
                    <input type="email" id="email" name="email" autocomplete="off" placeholder="Your Email" required>
                </label>
            </div>
            <br>
            <div class="text-field">
                <label for="tel">Phone Number:
                    <input id="tel" type="tel" name="phonenumber" placeholder="Phone number">
                </label>
            </div>
            <br>
            <div class="text-field">
                <label for="password">Password:
                    <input id="password" type="password" name="pwd" placeholder="Your Password" title="Minimum 6 characters at 
                                                    least 1 Alphabet and 1 Number"
                        pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
                </label>
            </div>
            <br>
            
            <button type="submit" name="submit" value="Daftar">Sign Up</button>
        </form>
    </main>
</body>

</html>