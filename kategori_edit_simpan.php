<?php
include "koneksi.php";

if(isset($_POST['kategori']))
$kategori = $_POST['kategori'];

if(isset($_POST['ongkos']))
$ongkos = $_POST['ongkos'];

if(isset($_POST['id_kategori']))
$id_kategori = $_POST['id_kategori'];


if(isset($_POST['keterangan']))
$keterangan = $_POST['keterangan'];

if
($hasil = mysql_query("UPDATE list_kategori SET kategori='$kategori', ongkos='$ongkos', keterangan='$keterangan' WHERE id_kategori='$id_kategori'", $id_mysql));

else
($hasil = mysql_query("UPDATE list_kategori SET kategori='$kategori', ongkos='$ongkos', keterangan='$keterangan' WHERE id_kategori='$id_kategori'", $id_mysql));


echo "id_kategori=$id_kategori<br>kategori=$kategori <br>ongkos=$ongkos<br><br>keterangan=$keterangan<br>";

if($hasil)
echo "<h3 align=center>Edit Jenis Berhasil</h3>";
else
echo "<h3 align=center>Edit Jenis Gagal</h3>";

print("<html><head><meta http-equiv='refresh'content='0;url=kategori.php'></head><body></body></html>");
?>