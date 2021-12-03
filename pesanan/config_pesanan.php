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
    $id_customer = htmlspecialchars($data["id_customer"]);
    
    //menginput data ke database Pemesanan
    $query = "INSERT INTO pemesanan VALUES 
         ('','$tgl','$status','$haircut','$id_customer')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel Pemesanan 
}

//menghapus data pemesanan
function hapus_pesanan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_pesanan($data)
{
    global $conn;
    $id = $data['id'];
    $tgl = htmlspecialchars($data["tgl"]);
    $status = htmlspecialchars($data["status"]);
    $haircut = htmlspecialchars($data["haircut"]);
    $id_customer = htmlspecialchars($data["id_customer"]);


    //update data pemesanan
    $query = "UPDATE pemesanan SET
            tgl = '$tgl',
            status = '$status',
            id_haircut = '$haircut',
            id_customer = '$id_customer'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}