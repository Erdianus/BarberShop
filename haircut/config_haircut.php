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

// CONFIGUARTION TABEL HAIRCUT

//menambah data HAIRCUT
function tambah_haircut($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    
    //menginput data ke database Haircut
    $query = "INSERT INTO haircut VALUES 
        ('','$nama','$harga')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel haircut 
}

//menghapus data haircut
function hapus_haircut($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM haircut WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_haircut($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);


    //update data haircut
    $query = "UPDATE haircut SET
            nama = '$nama',
            harga = '$harga'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}