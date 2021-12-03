<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require "config_haircut.php";

$id = $_GET["id"];

if( hapus_haircut($id) > 0 ){
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = '../haircut.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = '../haircut.php';
    </script>
    ";
}