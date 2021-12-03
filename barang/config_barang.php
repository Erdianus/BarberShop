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

// CONFIGUARTION TABEL BARANG

//menambah data BARANG
function tambah_barang($data)
{
    global $conn;
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $stok = htmlspecialchars($data["stok"]);
    
    //menginput data ke database Barang
    $query = "INSERT INTO barang VALUES 
        ('','$nama_barang','$harga_barang','$stok')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel barang 
}

//menghapus data barang
function hapus_barang($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_barang($data)
{
    global $conn;
    $id = $data["id"];
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $stok = htmlspecialchars($data["stok"]);

    //update data barang
    $query = "UPDATE barang SET
            nama_barang = '$nama_barang',
            harga_barang = '$harga_barang'
            stok = '$stok'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}