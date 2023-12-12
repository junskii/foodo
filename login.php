<?
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap');
    </style>
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
   <div>
    <header class="res_2">
        <img class="" id="logo_atas"src="image/foodo_logo.png" alt="logo">
        <img src="image/Foodo.png" alt="">
    </header>
    <main class="fes_2">
        <img class="makanan"id="mie" src="image/mie.png" alt="">
        <br class="makanan"><br class="makanan"><br class="makanan"><br class="makanan">
        <div class="res_2 fes_2">
            <img id="loginlogo" src="/image/Login..png" alt="">
            <br><br><br>
            <form action="loginproses.php" method="post"> 
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
                <div class="button">
                    <button id="login" name="submit" type="submit"><img src="/image/Login_button.png" alt=""></button>
                </div>
            </form>
            <br>
            <div class="sign_up">
                <p>Don't have an account yet?</p>
               <div class="signup">
                <a href="regist.php" id="signup_btn" type="button" value="Sign Up" >Sign Up</a>
               </div>
            </div>
        </div>
    
    </main>
   </div>
    <div id="gambarlogin">
        <img src="/image/background_login.png" alt="">
    </div>
    <img class="makanan" id="nasigoreng"src="/image/nasi_goreng_login.png" alt="">
</body>
</html>