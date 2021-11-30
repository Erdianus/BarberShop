<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'config.php';
// Konfigurasi Pagination
$result = mysqli_query($conn, "SELECT * FROM customer");
$jumlahDataPerHalaman = 4;
$jumlahData = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //ceil adalah pembulatan bilangan keatas
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$customer = mysqli_query($conn, "SELECT * FROM customer LIMIT $awalData, $jumlahDataPerHalaman");
$crud = mysqli_query($conn, "SELECT * FROM costomer");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Data Customer</title>
</head>

<body>
    <!-- NAVIGASTION BAR -->
    <ul>
        <li><a class="logo" href="admin.php">BARBER SHOP</a></li>
        <li><a class="logo" href="barberman.php">BarberMan</a></li>
        <li><a class="logo" href="#">Haircut</a></li>
        <li><a class="logo" href="customer.php">Customer</a></li>
        <li class="login"><a href="logout.php">LOGOUT</a></li>
    </ul>

    <div class="container">
        <div class="title">
            <img class="logo-img" src="img/logo barbershop.png">
            <h1>WELCOME TO THE BARBERSHOP</h1>
            <p>Potong rambutmu disini dan dapatkan pelayanan yang profesional dari kami </p>
        </div>
        <div class="btn-tambah">
            <a class="tambah" href="customer/tambah.php">TAMBAH</a>
        </div>
        <!--TABLE CUSTOMER-->
        <table class="table">
            <!--PAGINATION-->
            <div class="page">
                <?php if ($halamanAktif > 1) : ?>
                    <div class="page-content">
                        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                    </div>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                        <div class="page-content">
                            <a class="page-hover" href="?halaman=<?= $i ?>"><?= $i; ?></a>
                        </div>
                    <?php else : ?>
                        <div class="page-content">
                            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <div class="page-content">
                        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
                    </div>
                <?php endif; ?>

                <?php if ($halamanAktif > $jumlahHalaman) : ?>
                    <?php echo "<script>alert('Data tidak ada')</script>";  ?>
                <?php endif; ?>
            </div>

            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            foreach ($customer as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["username"]; ?></td>
                    <td><?= $row["nama_depan"]; ?></td>
                    <td><?= $row["nama_belakang"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td class="button-aksi">
                        <a class="edit" href="customer/update.php?username=<?= $row['username']; ?>">EDIT</a> |
                        <a class="hapus" href="customer/hapus.php?username=<?= $row['username']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">HAPUS</a>
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