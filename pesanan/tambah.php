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
            alert('Pesanan berhasil dibuat!');
            document.location.href = '../pesan_customer.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal Memesan!');
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
    <title>Data Pesanan</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1> FORM TAMBAH PEMESANAN</h1>
            <form action="" method="post">
                <table>
                    <?php
                    //untuk mendapatkan id_customer yang sedang login
                    $user = $_SESSION['user'];
                    $query_custom = "SELECT * FROM customer WHERE username = '$user'";
                    $id_user = mysqli_query($conn,$query_custom);
                    $data_user = mysqli_fetch_array($id_user);
                    $id = $data_user["id"];
                    ?>
                    <input type="hidden" name="id_customer" id="id_customer" value="<?= $id; ?>" required></td>
                    <input type="hidden" name="status" id="status" value="Belum Bayar" required></td>
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
                                echo "<option value=".$data['id'].">".$data['haircut']."</option>";
                            }
                            ?>
                            </select>
                            
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tgl">TANGGAL PEMESANAN</label></td>
                        <td><input type="datetime-local" name="tgl" id="tgl" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="submit" value="PESAN">Pesan</button>
                </p>
                <a class="back" href="../pesan_customer.php">Kembali</a>
            </form>
        </div>
        </form>
    </div>
</body>

</html>