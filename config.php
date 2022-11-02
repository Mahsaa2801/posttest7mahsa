<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['cari'])) {
   $cari = $_POST['keyword'];
   $result = mysqli_query($conn, "SELECT * FROM bunga WHERE nama LIKE '%$cari%' OR jenis LIKE '%$cari%' OR jumlah LIKE '%$cari%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM bunga" );
}
$bunga = [];

while ($row = mysqli_fetch_assoc($result)){
    $bunga[] = $row;
}
?>

<html>
    <head>
        <title>HALAMAN INPUT DATA</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <div class="wraper" id="title-id">
            <div class="title">CRUD</div>
            <td>
                <div class="form-outline">
                    <input type="text" name="cari" id="cari" class="form-control">
                </div>
            </td>
            <td>
                <button type="submit" class="btn btn-secondary" name="search">
                    <i class = "fas fa-search"></i>
                </button>
            </td>
            </tr>
            <div class="sidebar-left">
                <form class="form" action="aksi.php" method="POST">
                    <input type="text" name="nama" placeholder="Nama Bunga" class="input" required><br>
                    <input type="text" name="jenis" placeholder="Jenis Bunga" class="input" required><br>
                    <input type="number" name="harga" placeholder="Harga Bunga" class="input" required><br>
                    <input type="number" name="jumlah" placeholder="Jumlah Bunga" class="input" required><br>
                    <input type="file" name="gambar" class="input" required><br>
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
                    <?php $i = 1; foreach($bunga as $bng) :?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $bng['nama']; ?></td>
                        <td><?php echo $bng['jenis']; ?></td>
                        <td><?php echo $bng['harga']; ?></td>
                        <td><?php echo $bng['jumlah']; ?></td>
                        <td><img src="img/<?php echo $bng['gambar']; ?>"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $bng["id"]; ?>" class="aksi green">Ubah</a>
                            <a href="hapus.php?id=<?php echo $bng["id"]; ?>" onclick="return confirm('Apakah Data Ingin Dihapus?');" class="aksi red">Hapus</a>
                        </td>
                        
                    </tr>
                    <?php $i++; endforeach; ?>
                </table>   
            </div>
        </div>             
        <div style="clear:both;"></div>  
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>

    </body>

</html>