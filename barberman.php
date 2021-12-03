<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Data Barberman</title>
</head>

<body>
    <!-- NAVIGASTION BAR -->
    <ul>
        <li><a class="logo" href="admin.php">BARBER SHOP</a></li>
        <li><a class='logo' href='barberman.php'>BarberMan</a></li>
        <li><a class='logo' href='haircut.php'>Haircut</a></li>
        <li><a class="logo" href="customer.php">Customer</a></li>
        <li><a class="logo" href="pesanan.php">Pesanan</a></li>
        <li><a class="logo" href="barang.php">Barang</a></li>
        <li class="login"><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">LOGOUT</a></li>
    </ul>

    <div class="container">
        <div class="title">
            <img class="logo-img" src="img/logo barbershop.png">
            <h1>WELCOME TO THE BARBERSHOP</h1>
            <p>Potong rambutmu disini dan dapatkan pelayanan yang profesional dari kami </p>
        </div>
        <div class="btn-tambah">
            <a class="tambah" href="barberman/tambah.php">TAMBAH</a>
        </div>

        <!-- TABLE BARBERMAN -->
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>ID Spesialis</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $barberman = mysqli_query($conn, "SELECT * FROM barberman");
            foreach ($barberman as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["no_hp"]; ?></td>
                    <td><?= $row["id_haircut"]; ?></td>
                    <td><img src="upload/<?= $row["gambar"]; ?>" width="30"></td>
                    <td class="button-aksi">
                        <a class="edit" href="barberman/update.php?id=<?= $row['id']; ?>">EDIT</a> |
                        <a class="hapus" href="barberman/hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">HAPUS</a>
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