<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require "config_pesanan.php";

$id = $_GET["id"];

if( hapus_pesanan($id) > 0 ){
    echo "
    <script>
        alert('Pesanan berhasil dihapus!');
        document.location.href = '../pesan_customer.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Pesanan gagal dihapus!');
        document.location.href = '../pesan_customer.php';
    </script>
    ";
}