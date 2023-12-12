<?php
session_start();
include 'koneksi.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mengecek apakah email sudah terdaftar di database
    $result = mysqli_query($mysqli, "SELECT * FROM Customers WHERE Email='$email'");

    // Jika user terdaftar
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if(password_verify($password . $row['Salt'], $row['PasswordHash'])){
            // Membuat session
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['CustomerID']; // Jika perlu menyimpan ID pengguna ke dalam session

            header("Location: dashboard.php");
            exit;
        }
    } 

    echo "<script>
            alert('Email atau password salah');
            document.location.href = 'login.php';
          </script>";
}
?>
