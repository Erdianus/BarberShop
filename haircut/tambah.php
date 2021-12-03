<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "config_haircut.php";
if (isset($_POST["submit"])) {

    if (tambah_haircut($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../haircut.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../haircut.php';
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
    <title>Document</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1>FORM TAMBAH HAIRCUT</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama">NAMA</label></td>
                        <td><input type="text" name="nama" id="nama" placeholder="NAMA" required></td>
                    </tr>
                    <tr>
                        <td><label for="harga">harga</label></td>
                        <td><input type="number" name="harga" id="harga" placeholder="harga" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="TAMBAH DATA">Tambah</button>
                </p>
                <a class="back" href="../barberman.php">Kembali</a>
            </form>
        </div>
        <!-- <div class="box-crud">
            <h1>FORM TAMBAH HAIRCUT</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label for="nama">Nama</label>
                        </td>
                        <td>
                            <input type="text" name="nama" id="nama" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga">Harga</label>
                        </td>
                        <td>
                            <input type="number" name="harga" id="harga" required>
                        </td>
                        <td><button class="btn" type="submit" name="submit" value="TAMBAH DATA">Tambah</td>
                    </tr>
                </table>
                <p><a class="back" href="../barberman.php">KEMBALI</a></p>
            </form>
        </div> -->
    </div>
</body>

</html>