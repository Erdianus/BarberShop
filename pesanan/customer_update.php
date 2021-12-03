<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require "config_pesanan.php";

// ambil data di url
$id = $_GET["id"];
$pesanan = query("SELECT * FROM pemesanan WHERE id = $id")[0];
//var_dump(query("SELECT * FROM pemesanan WHERE id = $id")[0]);die;
if (isset($_POST["submit"])) {
    //var_dump($_POST['id_customer']);die;
    if (update_pesanan($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diupdate!');
            document.location.href = '../pesan_customer.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diupdate!');
            document.location.href = '../pesan_customer.php';
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
    <title>DATA PESANAN</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1> FORM EDIT PESANAN</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                $query = "SELECT * FROM haircut";
                $haircut = mysqli_query($conn, $query) or die(mysqli_error($conn));
                ?>
                <table>
                    <input type="hidden" name="id" value="<?= $pesanan["id"]; ?>">
                    <input type="hidden" name="status" value="<?= $pesanan["status"]; ?>">
                    <tr>
                        <td><label for="tgl">ID CUSTOMER</label></td>
                        <td><input type="text" name="id_customer" id="id_customer" value="<?=$pesanan['id_customer']?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="tgl">TANGGAL PEMESANAN</label></td>
                        <td><input type="datetime-local" name="tgl" id="tgl" value="<?= $pesanan["tgl"]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="haircut">MODEL HAIRCUT</label></td>
                        <td>
                            <select id="haircut" name="haircut" >
                                <?php
                                while ($data = mysqli_fetch_array($haircut)) {
                                    echo "<option value=" . $data['id'] . ">" . $data['haircut'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="UBAH DATA">Update</button>
                </p>
                <a class="back" href="../pesan_customer.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>