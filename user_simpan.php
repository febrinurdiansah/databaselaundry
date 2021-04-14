<?php
if(isset($_POST['nama']))
$nama= $_POST['nama'];

if(isset($_POST['username']))
$username = $_POST['username'];

if(isset($_POST['sandi']))
$sandi= $_POST['sandi'];

if(isset($_POST['kode_user']))
$kode_user = $_POST['kode_user'];

include "koneksi.php";

$hasil = mysql_query("INSERT INTO user (nama, username, password, kode_user) VALUES ('$nama', '$username', password('$sandi'), '$kode_user')", $id_mysql);

if($hasil)
echo ("Simpan User Berhasil");
else
echo ("Simpan User Gagal");

print("<html><head><meta http-equiv='refresh' content='0;url=user.php'></head><body></body></html>");
?>