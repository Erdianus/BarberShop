<?php

$conn = mysqli_connect("localhost", "root", "", "barbershop");

function query($query)
{
    global $conn;
    
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// CONFIGUARTION TABEL PEMESANAN

//menambah data PESANAN
function tambah_pesanan($data)
{
    global $conn,$user;
    $tgl = htmlspecialchars($data["tgl"]);
    $status = htmlspecialchars($data["status"]);
    $haircut = htmlspecialchars($data["haircut"]);
    $user = htmlspecialchars($data["user"]);
    
    //menginput data ke database Customer
    $query = "INSERT INTO pemesanan VALUES 
         ('','$tgl','$status','$haircut','$user')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel Customer 
}

//menghapus data customer
function hapus_pesanan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_pesanan($data)
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