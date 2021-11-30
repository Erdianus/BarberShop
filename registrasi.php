<?php
require "config.php";
if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('Registrasi Berhasil!');
            document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Registrasi Gagal!');
            document.location.href = 'login.php';
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
    <link rel="stylesheet" href="css/style_crud.css">
    <title>REGISTRATION</title>
</head>

<body>
    <div class="form">
        <div class="box-register">
            <h1>HALAMAN REGISTRASI</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="username">USERNAME</label></td>
                        <td><input type="text" name="username" id="username" placeholder="USERNAME ANDA" required></td>
                    </tr>
                    <tr>
                        <td><label for="namaDpn">NAMA DEPAN</label></td>
                        <td><input type="text" name="namaDpn" id="namaDpn" placeholder="NAMA DEPAN" required></td>
                    </tr>
                    <tr>
                        <td><label for="namaBlkg">NAMA BELAKANG</label></td>
                        <td><input type="text" name="namaBlkg" id="namaBlkg" placeholder="USERNAME ANDA" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">EMAIL</label></td>
                        <td><input type="email" name="email" id="email" placeholder="EMAIL ANDA" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">PASSWORD</label></td>
                        <td><input type="password" name="password" id="password" placeholder="PASSWORD ANDA" required></td>
                    </tr>
                    <tr>
                        <td><label for="password2">CONFIRM PASSWORD</label></td>
                        <td><input type="password" name="password2" id="password2" placeholder="PASSWORD ANDA" required></td>
                    </tr>
                </table>
                <p class="btn-regis">
                    <button class="btn registrasi" type="submit" name="register">Register</button>
                </p>
                <a class="back" href="login.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>