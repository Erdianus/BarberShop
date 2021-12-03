<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
// else if(!(isset($_SESSION["user"]) == "admin")){
//     header("Location: home.php");
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ADMIN</title>
</head>

<body>
    <!-- NAVIGASTION BAR -->
    <ul>
        <li><a class="logo" href="admin.php">BARBER SHOP</a></li>
        <li><a class="logo" href="barberman.php">Barber Man</a></li>
        <li><a class="logo" href="haircut.php">Haircut</a></li>
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
            <p><?php echo $_SESSION["user"] ?></p>
        </div>
        <div class="admin">
            <h1>MENU ADMIN</h1>
            <div class="list-menu-admin">
                <div class="box">
                    <a href="customer.php"><img src="img/customer-loyalty-v2.png" alt="Customer"></a>
                    <p><a href="customer.php">Daftar Costumer</a></p>
                </div>
                <div class="box">
                    <a href="barberman.php"><img src="img/profile barberman.jpg" alt="BarberMan"></a>
                    <p><a href="barberman.php">Daftar Barberman</a></P>
                </div>
                <div class="box">
                    <a href="#"><img src="img/haircut.jpg" alt="Haircuts"></a>
                    <p><a href="#">Daftar Haircuts</a></P>
                </div>
                <div class="box">
                    <a href="#"><img src="img/pesanan.png" alt="Pesanan"></a>
                    <p><a href="#">Daftar Pesanan</a></P>
                </div>
            </div>
        </div>
        <div class="footer">
            Copyright © Erdianus Pagesong
        </div>
    </div>

</body>

</html>