<?php
include "koneksi.php";

if (isset($_POST['nama']))
$nama = $_POST['nama'];

if (isset($_POST['username']))
$username = $_POST['username'];

if (isset($_POST['sandi_asli']))
$sandi_asli = $_POST['sandi_asli'];

if (isset($_POST['kode_user']))
$kode_user = $_POST['kode_user'];

if (isset($_POST['id_user']))
$id_user = $_POST['id_user'];


if (isset($_POST['sandi'])) {
$sandi = $_POST['sandi'];
if($sandi==""){
	$sandi= $sandi_asli;
$hasil = mysql_query("UPDATE user SET nama='$nama', username='$username', password='$sandi', kode_user='$kode_user' WHERE id_user='$id_user'", $id_mysql);
}
else
$hasil = mysql_query("UPDATE user SET nama='$nama', username='$username', password=password('$sandi'), kode_user='$kode_user' WHERE id_user='$id_user'", $id_mysql);
}

echo "id_user=$id_user<br>kode_user=$kode_user<br>username=$username<br>nama=$nama<br>sandi=$sandi<br>sandi_asli=$sandi_asli<br>";

if($hasil)
echo ("<h3 align=center> Edit Jenis Berhasil</h3>");
else
echo ("<h3 align=center> Edit Jenis Gagal</h3>");

print("<html><head><meta http-equiv='refresh' content='0;url=user.php'></head><body></body></html>");
?>