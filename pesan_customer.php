<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'config.php';
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Data Pesanan</title>
</head>

<body>
    <!-- NAVIGASTION BAR -->
    <ul>
        <li><a class="logo" href="home.php">BARBER SHOP</a></li>
        <li><a class="logo" href="pesan_customer.php">Pesanan Anda</a></li>
        <li class="login"><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">LOGOUT</a></li>
    </ul>

    <div class="container">
        <div class="title">
            <img class="logo-img" src="img/logo barbershop.png">
            <h1>WELCOME TO THE BARBERSHOP</h1>
            <p>Potong rambutmu disini dan dapatkan pelayanan yang profesional dari kami </p>
        </div>
        <div class="btn-tambah">
            <a class="tambah" href="pesanan/tambah.php">PESAN</a>
        </div>
        <!-- TABLE Pemesanan -->
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Model Haircut</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            //menentukan id user yang sedang login
            $user = $_SESSION["user"];
            $q = "SELECT * FROM customer WHERE username = '$user'";
            $qq = mysqli_query($conn, $q);
            $row = mysqli_fetch_assoc($qq);
            $id = $row['id'];
            $query = "SELECT * FROM pemesanan WHERE id_customer = '$id'";
            $pesanan = mysqli_query($conn, $query) or die(mysqli_error($conn));
            foreach ($pesanan as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["id_customer"]; ?></td>
                    <td><?= $row["tgl"]; ?></td>
                    <td><?= $row["id_haircut"]; ?></td>
                    <td><?= $row["status"]; ?></td>
                    <td class="button-aksi">
                        <a class="edit" href="pesanan/customer_update.php?id=<?= $row['id']; ?>">EDIT</a> |
                        <a class="hapus" href="pesanan/customer_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin membatalkan pesanan ini?');">BATAL</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="footer">
        Copyright © Erdianus Pagesong
    </div>
</body>

</html>