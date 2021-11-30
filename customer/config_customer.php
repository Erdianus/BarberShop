<?php
$conn = mysqli_connect("localhost", "root", "", "barbershop");

function query($query)
{
    global $conn;
    
    $result = mysqli_query($conn, $query);
    var_dump($result);die;
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// CONFIGUARTION TABEL CUSTOMER

//menambah data CUSTOMER
function tambah_customer($data)
{
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $namaDpn = htmlspecialchars($data["namaDpn"]);
    $namaBlkg = htmlspecialchars($data["namaBlkg"]);
    $email = htmlspecialchars($data["email"]);
    
    //menginput data ke database Customer
    $query = "INSERT INTO customer VALUES 
        ('$username','$password','$namaDpn','$namaBlkg','$email')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel Customer 
}

//menghapus data customer
function hapus_customer($username)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM customer WHERE username = $username");
    return mysqli_affected_rows($conn);
}

function update_customer($data)
{
    global $conn;
    $username = stripcslashes(htmlspecialchars($data["username"]));
    $namaDpn = htmlspecialchars($data["namaDpn"]);
    $namaBlkg = htmlspecialchars($data["namaBlkg"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);


    //update data customer
    $query = "UPDATE customer SET
            password = '$password',
            nama_depan = '$namaDpn',
            nama_belakang = '$namaBlkg',
            email = '$email'
            WHERE username = $username
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}