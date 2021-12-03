<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "config_barberman.php";
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
        <div class="box-register">
            <h1>FORM TAMBAH BARBERMAN</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama">NAMA</label></td>
                        <td><input type="text" name="nama" id="nama" placeholder="NAMA" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">EMAIL</label></td>
                        <td><input type="email" name="email" id="email" placeholder="EMAIL" required></td>
                    </tr>
                    <tr>
                        <td><label for="no_hp">NO HP</label></td>
                        <td><input type="text" name="no_hp" id="no_hp" placeholder="NO HP" required></td>
                    </tr>
                    <tr>
                        <td><label for="haircut">SPESIALIS</label></td>
                        <td> <?php
                                $query = "SELECT * FROM haircut";
                                $haircut = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                ?>
                            <select id="haircut" name="haircut">
                                <?php
                                while ($data = mysqli_fetch_array($haircut)) {
                                    echo "<option value=" . $data['id'] . ">" . $data['haircut'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="gambar">GAMBAR</label></td>
                        <td><input type="file" name="gambar" id="gambar"></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="TAMBAH DATA">Tambah</button>
                </p>
                <a class="back" href="../barberman.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>