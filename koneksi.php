<?php 
    $conn = mysqli_connect("localhost", "root", "", "posttest5");


    if (!$conn) {
        die("Gagal terhubung ke database" . mysqli_connect_error());
    }
?>    