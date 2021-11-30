<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "../config.php";

// ambil data di url
$id = $_GET["id"];

$barber = query("SELECT * FROM barberman WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (update_barberman($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diupdate!');
            document.location.href = '../barberman.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diupdate!');
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
    <title>UPDATE DATA</title>
</head>

<body>
    <div class="form">
        <div class="box-crud">
            <form action="" method="post" enctype="multipart/form-data">
                <h1> FORM UPDATE BARBER MAN</h1>
                <table>
                    <input type="hidden" name="id" value="<?= $barber["id"]; ?>">
                    <tr>
                        <td>
                            <label for="nama">Nama</label>
                        </td>
                        <td>
                            <input type="text" name="nama" id="nama" value="<?= $barber["nama"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" value="<?= $barber["email"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="no_hp">No HP</label>
                        </td>
                        <td>
                            <input type="number" name="no_hp" id="no_hp" value="<?= $barber["no_hp"]; ?>" required>
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
                        <td></td>
                        <td><img src="../upload/<?= $barber['gambar']; ?>" width="30"></td>
                    </tr>
                    <tr>
                        <td><button class="btn" type="submit" name="submit" value="UBAH DATA">Update</td>
                    </tr>
                </table>
                <p><a class="back" href="../barberman.php">KEMBALI</a></p>
            </form>
        </div>
    </div>
</body>

</html>