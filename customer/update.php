<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "config_customer.php";

// ambil data di url

$username = $_GET["username"];

$customer = query("SELECT * FROM customer WHERE username = '$username'");

if (isset($_POST["submit"])) {
    if (update_customer($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diupdate!');
            document.location.href = '../customer.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diupdate!');
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
    <title>EDIT Customer</title>
</head>
<body>
    <div class="form">
        <div class="box-registrasi">
            <form action="" method="post" enctype="multipart/form-data">
                <h1> FORM UPDATE CUSTOMER</h1>
                <table>
                    <tr>
                        <td>
                            <label for="username">Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" id="username" value="<?= $customer["username"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="namadpn">Nama Depan</label>
                        </td>
                        <td>
                            <input type="text" name="namadpn" id="namadpn" value="<?= $customer["namaDpn"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="namablkg">Nama Belakang</label>
                        </td>
                        <td>
                            <input type="text" name="namablkg" id="namablkg" value="<?= $customer["nama_belakang"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" value="<?= $customer["email"]; ?>" required>
                        </td>
                    </tr>
                    <input type="hidden" name="password" value="<?= $customer["password"]; ?>">
                    <tr>
                        <td><button class="btn" type="submit" name="submit" value="UBAH DATA">Update</td>
                    </tr>
                </table>
                <p><a class="back" href="../customer.php">KEMBALI</a></p>
            </form>
        </div>
    </div>
</body>

</html>