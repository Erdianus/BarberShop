<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "config_customer.php";
if (isset($_POST["submit"])) {

    if (tambah_customer($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../customer.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../customer.php';
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
    <title>CUSTOMER</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1>FORM TAMBAH CUSTOMER</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label for="username">Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" id="username" required>
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
                            <label for="namaDpn">Nama Depan</label>
                        </td>
                        <td>
                            <input type="text" name="namaDpn" id="namaDpn" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="namaBlkg">Nama Depan</label>
                        </td>
                        <td>
                            <input type="text" name="namaBlkg" id="namaBlkg">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="TAMBAH DATA">Tambah</button>
                </p>
                <a class="back" href="../customer.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>