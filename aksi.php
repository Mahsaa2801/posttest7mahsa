<?php
    require"config.php";
    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $gambar = $_FILES['gambar']['name'];

        if ($gambar != ""){
            $ekstensi = array('jpg', 'png');
            $x = explode('.', $gambar);
            $extensi = strtolower(end($x));
            $gambar_baru = "$nama.$extensi";
            $tmp = $_FILES['gambar']['tmp_name'];

            
            if(in_array($extensi, $ekstensi) === true) {
            move_uploaded_file($tmp, 'gambar/'.$gambar_baru);

            $sql =  "INSERT INTO bunga VALUES ('','$nama','$jenis','$harga','$jumlah','$gambar')";
            $run = mysqli_query($conn, $sql);  

        if($run){
            header('location: config.php');
        }else{
            echo "GAGAL INPUT DATA!";
        }
    }

    }
}
?>