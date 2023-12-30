<?php
session_start();
include 'koneksi.php';

// Memeriksa apakah formulir update telah disubmit
if (isset($_POST['submit'])) {
    // Mengambil data karyawan dari formulir
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];

    // Menjalankan query UPDATE untuk memperbarui data karyawan
    $result = mysqli_query($mysqli, "UPDATE Customers SET 
     FirstName='$first_name', LastName='$last_name', Email='$email' WHERE CustomerID={$_SESSION['user_id']}");
    // Mengarahkan kembali ke halaman utama setelah pembaruan berhasil
    header("Location: dashboard.php");
    exit();
}
?>