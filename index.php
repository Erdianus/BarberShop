<?php
session_start();
//jika session masih ada maka akan langsung ke redirect ke home.php
if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}
require "config.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username=="admin" && $password=="admin1234"){
        $_SESSION["login"] = true;
        $_SESSION["user"] = "admin";
        header("Location:admin.php");
        exit;
    }
    
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username'"); 
    //cek username yang ada didatabase
    if (mysqli_num_rows($result) === 1) {
        
        //cek password
        $row = mysqli_fetch_assoc($result); //$row = [id,username,password,namaDpn,namaBlkg,email]

        //password_verify() = untuk mengecek password apakah sama dengan yang didatabase. kebalikan dari password_hash 
        if (password_verify($password, $row["pass"])) {//
            //membuat session login
            $_SESSION["login"] = true;
            $_SESSION["user"]=$username;
            header("Location:home.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <img src="img/logo barbershop.png">
        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username atau Password anda salah!</p>
        <?php endif; ?>
        <div class="box-login">
            <h1>LOGIN</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            <input class="input" type="text" name="username" id="username" placeholder="USERNAME" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" class="input" id="password" name="password" placeholder="PASSWORD" required>
                        </td>
                    </tr>
                    <td>
                        <input type="checkbox" onclick="myFunction()"> Tampilkan Password
                        <script>
                            function myFunction(){
                                var x = document.getElementById("password");
                                if(x.type ==="password"){
                                    x.type = "text";
                                }else{
                                    x.type = "password";
                                }
                            }
                        </script>
                    </td>
                    <tr>
                        <td><button class="btn" type="submit" name="login">LOGIN</button></td>
                    </tr>

                </table>
            </form>
            <p class="regis"><a class="back" href="registrasi.php">REGISTER</a></p>
        </div>
    </div>
</body>

</html>