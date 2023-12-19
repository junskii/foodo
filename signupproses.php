<?php
session_start();
include 'koneksi.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];

$password = $_POST['password'];

// Buat salt secara acak
$salt = bin2hex(random_bytes(32));

// Gabungkan password dan salt, lalu buat hashnya
$passwordHash = password_hash($password . $salt, PASSWORD_DEFAULT);

// Simpan firstName, lastName, email, phoneNumber, passwordHash, dan salt ke dalam database
$sql = "INSERT INTO Customers (FirstName, LastName, Email, NomorTelepon, PasswordHash, Salt) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    echo "Error in preparing statement: " . $mysqli->error;
} else {
    $stmt->bind_param("ssssss", $fname, $lname, $email, $phonenumber, $passwordHash, $salt);

    if($stmt->execute()) {
        // Jika query berhasil, arahkan pengguna ke halaman login.php
        header("Location: signin.php");
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
