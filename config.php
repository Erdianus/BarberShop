<?php
$conn = mysqli_connect("localhost", "root", "", "barbershop");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;
    //stripslashes= digunakan untuk menghilangkan karakter slash yang diinputkan
    $username = stripcslashes(htmlspecialchars($data["username"]));
    $namaDpn = htmlspecialchars($data["namaDpn"]);
    $namaBlkg = htmlspecialchars($data["namaBlkg"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    
    //cek user khusus admin
    if($username == "admin"){
        echo "
        <script>
            alert('Username atau Email sudah terdaftar!');
            document.location.href = 'registrasi.php';
        </script>
        ";
        return false;
    }


    //cek username dan email customer sudah ada atau belum
    $cek_username = mysqli_query($conn, "SELECT username from customer WHERE username = '$username'");
    $cek_email = mysqli_query($conn, "SELECT email from custumer WHERE email = '$email'");
    if (mysqli_fetch_assoc($cek_username)) {
        echo "
        <script>
            alert('Username atau Email sudah terdaftar!');
            document.location.href = 'registrasi.php';
        </script>
        ";
        return false;
    }

    //konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi password anda tidak sesuai!');
            document.location.href = 'registrasi.php';
        </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menginput data ke database barberman
    $query = "INSERT INTO customer VALUES 
        ('','$username','$password','$namaDpn','$namaBlkg','$email')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel barberman
}
