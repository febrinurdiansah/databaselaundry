<?php
include "koneksi.php";

if (isset($_POST['nama']))
$nama = $_POST['nama'];

if (isset($_POST['alamat']))
$alamat = $_POST['alamat'];

if (isset($_POST['no_hp']))
$no_hp= $_POST['no_hp'];

if (isset($_POST['id_pelanggan']))
$id_pelanggan = $_POST['id_pelanggan'];

if (isset($_POST['keterangan'])) 
$keterangan = $_POST['keterangan'];

$hasil = mysql_query("UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_hp='$no_hp', keterangan='$keterangan' WHERE id_pelanggan='$id_pelanggan'", $id_mysql);

echo "id_pelanggan=$id_pelanggan<br>nama=$nama<br>alamat=$alamat<br>no_hp=$no_hp<br>keterangan=$keterangan<br>";

if($hasil)
echo ("<h3 align=center> Edit Pelanggan Berhasil</h3>");
else
echo ("<h3 align=center> Edit Pelanggan Gagal</h3>");

print("<html><head><meta http-equiv='refresh' content='0;url=pelanggan.php'></head><body></body></html>");
?>