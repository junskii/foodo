<?php
session_start();
include 'koneksi.php';

// Memeriksa apakah formulir update telah disubmit
if (isset($_POST['submit'])) {
    // Mengambil data karyawan dari formulir
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    // Menggunakan prepared statement untuk melindungi dari SQL injection
    $stmt = $mysqli->prepare("UPDATE Customers SET FirstName=?, LastName=?, Email=?, NomorTelepon=? WHERE CustomerID=?");
    
    // Bind parameter ke statement
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phonenumber, $_SESSION['user_id']);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Jika pembaruan berhasil, arahkan kembali ke halaman utama
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error updating record: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}
?>
