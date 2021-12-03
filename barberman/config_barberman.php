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

// CONFIGUARTION TABEL BARBERMAN

//menambah data barberman
function tambah_barberman($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    //mengupload gambar

    $gambar = upload();

    //mengecek apakah gambar sudah diupload atau belum
    if (!$gambar) {
        return false;
    }
    
    //menginput data ke database barberman
    $query = "INSERT INTO barberman VALUES 
        ('','$nama','$email','$no_hp','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); //mengreturn jumlah row yang berubah pada tabel barberman 
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];


    //mengecek apakah file sudah diupload atw belum dengan nilai error 4
    if($error === 4){
        echo"
        <script>
        alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //mengecek apakah file yang diupload adalah gambar
    $ekstensiGambar = explode('.',$namaFile);//membagi string berdasarkan tanda titik
    $ekstensiGambarValid = ['jpg','jpeg','png'];

    //mengambil nilai indeks terakhir dan menjadikan mengubah semua huruf menjadi lowercase
    $ekstensiGambar = strtolower(end($ekstensiGambar)); 

    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo"
        <script>
        alert('File yang anda masukkan bukan file gambar!');
        </script>";
        return false;
    }

    //mengecek file kurang dari 1 MB
    if($ukuranFile > 1000000){
        echo"
        <script>
        alert('File anda lebih dari 1 Mb silahkan upload file kurang dari 1Mb!');
        </script>";
        return false;
    }

    //mengupload file jika sudah dicek
    //mengenerate nama file baru agar file gambar tidak ada yang sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar; 
    
    move_uploaded_file($tmp_name, "../upload/$namaFileBaru");
    return $namaFileBaru;
}

//menghapus data barberman
function hapus_barberman($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM barberman WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_barberman($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    //update data barberman
    $query = "UPDATE barberman SET
            nama = '$nama',
            email = '$email',
            no_hp = '$no_hp',
            gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}