<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$user = $_SESSION["user"];
require "config_pesanan.php";
if (isset($_POST["submit"])) {

    if (tambah_pesanan($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../pesanan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../pesanan.php';
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
    <title>Data Pesanan</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1> FORM TAMBAH PEMESANAN</h1>
            <form action="" method="post">
                <table>

                    <input type="hidden" name="usernme" id="username" value="<?= $user; ?>" required></td>
                    <tr>
                        <td><label for="haircut">MODEL HAIRCUT</label></td>
                        <td>
                            <?php
                            $query = "SELECT * FROM haircut";
                            $haircut = mysqli_query($conn,$query) or die(mysqli_error($conn));
                            ?>
                            <select id="haircut" name="haircut">
                            <?php    
                            while ($data = mysqli_fetch_array($haircut)) {
                                echo "<option value=".$data['nama'].">".$data['nama']."</option>";
                            }
                            ?>
                            </select>
                            
                        </td>
                        <!-- <td><input type="haircut" name="haircut" id="haircut" required></td> -->
                    </tr>
                    <tr>
                        <td><label for="tgl">TANGGAL PEMESANAN</label></td>
                        <td><input type="datetime-local" name="tgl" id="tgl" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="PESAN">Pesan</button>
                </p>
                <a class="back" href="../pesanan.php">Kembali</a>
            </form>
        </div>
        </form>
    </div>
</body>

</html>