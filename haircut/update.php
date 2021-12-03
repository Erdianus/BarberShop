<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "config_haircut.php";

// ambil data di url
$id = $_GET["id"];

$haircut = query("SELECT * FROM haircut WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (update_haircut($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diupdate!');
            document.location.href = '../haircut.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diupdate!');
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
    <title>UPDATE DATA</title>
</head>

<body>
    <div class="form">
        <div class="box-crud">
            <form action="" method="post" enctype="multipart/form-data">
                <h1> FORM UPDATE HAIRCUT</h1>
                <table>
                    <input type="hidden" name="id" value="<?= $haircut["id"]; ?>">
                    <tr>
                        <td>
                            <label for="nama">Nama</label>
                        </td>
                        <td>
                            <input type="text" name="nama" id="nama" value="<?= $haircut["nama"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga">Harga</label>
                        </td>
                        <td>
                            <input type="number" name="harga" id="harga" value="<?= $haircut["harga"]; ?>" required>
                        </td>
                    <tr>
                        <td><button class="btn" type="submit" name="submit" value="UBAH DATA">Update</td>
                    </tr>
                </table>
                <p><a class="back" href="../haircut.php">KEMBALI</a></p>
            </form>
        </div>
    </div>
</body>

</html>