<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "config_customer.php";

// ambil data di url

$id = $_GET["id"];
$customer = query("SELECT * FROM customer WHERE id = $id")[0];

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
        <div class="box-register">
            <h1> FORM UPDATE CUSTOMER</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <input type="hidden" name="id" value="<?= $customer["id"]; ?>">
                    <tr>
                        <td><label for="username">USERNAME</label></td>
                        <td><input type="text" name="username" id="username" value="<?= $customer["username"]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="namaDpn">NAMA DEPAN</label></td>
                        <td><input type="namaDpn" name="namaDpn" id="namaDpn" value="<?= $customer["nama_depan"]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="namaBlkg">NAMA BELAKANG</label></td>
                        <td><input type="text" name="namaBlkg" id="namaBlkg" value="<?= $customer["nama_belakang"]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">EMAIL</label></td>
                        <td><input type="text" name="email" id="email" value="<?= $customer["email"]; ?>" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="UBAH DATA">Update</button>
                </p>
                <a class="back" href="../customer.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>