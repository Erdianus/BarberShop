<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "config_barang.php";
if (isset($_POST["submit"])) {

    if (tambah_barang($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../barang.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../barang.php';
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
    <link rel="stylesheet" href="../css/style_crud.css">
    <title>Barang</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1>FORM TAMBAH BARANG</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama_barang">NAMA</label></td>
                        <td><input type="text" name="nama_barang" id="nama_barang" placeholder="NAMA" required></td>
                    </tr>
                    <tr>
                        <td><label for="harga_barang">HARGA</label></td>
                        <td><input type="email" name="harga_barang" id="harga_barang" placeholder="HARGA" required></td>
                    </tr>
                    <tr>
                        <td><label for="stok">STOK</label></td>
                        <td><input type="number" name="stok" id="stok" placeholder="STOK" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="TAMBAH DATA">Tambah</button>
                </p>
                <a class="back" href="../barang.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>