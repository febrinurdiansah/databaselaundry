<?php
if(isset($_POST['kategori']))
$kategori = $_POST['kategori'];

if(isset($_POST['ongkos']))
$ongkos = $_POST['ongkos'];

if(isset($_POST['keterangan']))
$keterangan = $_POST['keterangan'];

include "koneksi.php";

$hasil = mysql_query("INSERT INTO list_kategori (kategori, ongkos, keterangan) VALUES ('$kategori', '$ongkos', '$keterangan')", $id_mysql);
if ($hasil)
echo ("Simpan kategori Berhasil<br>");
else
echo ("Simpan kategori Gagal<br>");

print("<html><head><meta http-equiv='refresh' content='0;url=kategori.php'></head<body></body></html>");
?>
