<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require "config_barang.php";

$id = $_GET["id"];

if( hapus_barang($id) > 0 ){
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = '../barang.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = '../barang.php';
    </script>
    ";
}