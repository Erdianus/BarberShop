<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "../config.php";
if (isset($_POST["submit"])) {

    if (tambah_barberman($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../barberman.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../barberman.php';
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
        <div class="box-crud">
            <h1>FORM TAMBAH BARBER MAN</h1>
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
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="no_hp">No HP</label>
                        </td>
                        <td>
                            <input type="number" name="no_hp" id="no_hp" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gambar">Pas Photo</label>
                        </td>
                        <td>
                            <input type="file" name="gambar" id="gambar">
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn" type="submit" name="submit" value="TAMBAH DATA">Tambah</td>
                    </tr>
                </table>
                <p><a class="back" href="../barberman.php">KEMBALI</a></p>
            </form>
        </div>
    </div>
</body>

</html>