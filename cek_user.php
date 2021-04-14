<?php
session_start();
if(!isset($_SESSION["username"]) and !isset($_SESSION["password"])){
echo "<script>alert<'Anda Belum Login, Mohon login terlebih dahulu')</script>";

print("<html><head><meta http-equiv='refresh'content='0;url=index.php'></head><body></body></html>");
}
else{
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$id_user = $_SESSION["id_user"];
$kode_user = $_SESSION["kode_user"];
}
?>