<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'config.php';
// Konfigurasi Pagination
$result = mysqli_query($conn, "SELECT * FROM pemesanan");
$jumlahDataPerHalaman = 4;
$jumlahData = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //ceil adalah pembulatan bilangan keatas
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
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
        <li><a class="logo" href="admin.php">BARBER SHOP</a></li>
        <li><a class='logo' href='barberman.php'>BarberMan</a></li>
        <li><a class='logo' href='#'>Haircut</a></li>
        <li><a class="logo" href="customer.php">Customer</a></li>
        <li><a class="logo" href="pesanan.php">Pesanan</a></li>
        <li class="login"><a href="logout.php">LOGOUT</a></li>
    </ul>

    <div class="container">
        <div class="title">
            <img class="logo-img" src="img/logo barbershop.png">
            <h1>WELCOME TO THE BARBERSHOP</h1>
            <p>Potong rambutmu disini dan dapatkan pelayanan yang profesional dari kami </p>
        </div>
        <!-- TABLE Pemesanan -->
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
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Model Haircut</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = "SELECT * FROM pemesanan
                    INNER JOIN customer ON pemesanan.id_customer = customer.id
                    INNER JOIN haircut ON pemesanan.id_haircut = haircut.id";
            $pesanan = mysqli_query($conn,$query) or die(mysqli_error($conn));
            // var_dump($query);die;
            foreach ($pesanan as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["username"]; ?></td>
                    <td><?= $row["tgl"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["status"]; ?></td>
                    <td class="button-aksi">
                        <a class="edit" href="pesanan/update.php?id=<?= $row['id']; ?>">EDIT</a> |
                        <a class="hapus" href="pesanan/hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">HAPUS</a>
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