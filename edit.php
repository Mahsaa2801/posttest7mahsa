<?php
require 'koneksi.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM bunga WHERE id=$id");

$bng = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bng[] = $row;
}

$bng = $bng[0];

if (isset($_POST["tambah"])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $harga = htmlspecialchars($_POST['harga']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $gambar = $gambar['gambar'];

    $sql = "UPDATE bunga SET nama = '$nama', jenis = '$jenis', harga = '$harga', jumlah = '$jumlah', gambar = '$gambar' WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'config.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Data gagal diubah');
                document.location.href = 'edit.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
<div class="wraper" id="title-id">
            <div class="title">CRUD</div>
            <div class="sidebar-left">
                <form class="form" method="POST">
                    <input type="text" name="nama" placeholder="Nama Bunga" class="input" value ="<?php echo $bng['nama'] ?>"required><br>
                    <input type="text" name="jenis" placeholder="Jenis Bunga" class="input" value ="<?php echo $bng['jenis'] ?>" required><br>
                    <input type="number" name="harga" placeholder="Harga Bunga" class="input" value ="<?php echo $bng['harga'] ?>" required><br>
                    <input type="number" name="jumlah" placeholder="Jumlah Bunga" class="input" value ="<?php echo $bng['jumlah'] ?>"required><br>
                    <input type="file" name="gambar" class="input" value ="<?php echo $bng['gambar'] ?>"required><br>
                    <input type="submit" name="tambah" value="simpan data"  class="btn">
                </form>
        </div>
        <div class ="sidebar-right">
            <div style="padding:20px>
                <span style="font-size:20px;"> DATA BUNGA </span>
                <table class="table1">
                     <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama</th>
                        <th width="15%">Jenis</th>
                        <th width="10%">Harga</th>
                        <th width="10%">Jumlah</th>
                        <th width="15%">File Gambar</th>
                        <th width="15%">Aksi</th>
                    </tr>
</body>
</html>