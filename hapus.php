<?php
require 'koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM bunga WHERE id =$id");

if ($result) {
    header('location: config.php');
}else{
    echo "
    <script>
    allert('Data Telah Di Perbarui');
    document.location.href = 'edit.php?id=$id';
    </script>";
}
?>  