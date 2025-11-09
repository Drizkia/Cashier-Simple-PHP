<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'nwind');
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    return $conn;
?>