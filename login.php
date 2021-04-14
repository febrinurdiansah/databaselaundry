<?php
session_start();
if(isset($_POST['username']));
$username = $_POST['username'];

if(isset($_POST['sandi']));
$sandi = $_POST['sandi'];

include "koneksi.php";

$hasil = mysql_query("SELECT * FROM user WHERE username='$username' and password=password('$sandi')", $id_mysql);

$jumlah = mysql_num_rows($hasil);

if($jumlah==0){
echo "<script>alert('Login Gagal,Silahkan Ulangi Lagi')</script>";
print("<html><head><meta http-equiv='refresh'content='0;url=index.php'></head><body></body></html>");
}
else{

while($baris=mysql_fetch_array($hasil)){
$username=$baris['username'];
$password=$baris['password'];
$id_user=$baris['id_user'];
$kode_user=$baris['kode_user'];
}

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;
$_SESSION["id_user"]=$id_user;
$_SESSION["kode_user"]=$kode_user;

print("<html><head><meta http-equiv='refresh'content='0;url=selamat.php'></head><body></body></html>");
}
?>