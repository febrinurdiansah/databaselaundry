<?php
if(isset($_POST['nama']))
$nama= $_POST['nama'];

if(isset($_POST['alamat']))
$alamat = $_POST['alamat'];

if(isset($_POST['no_hp']))
$no_hp= $_POST['no_hp'];

if(isset($_POST['keterangan']))
$keterangan = $_POST['keterangan'];

include "koneksi.php";

$hasil = mysql_query("INSERT INTO pelanggan (nama, alamat, no_hp, keterangan) VALUES ('$nama', '$alamat', '$no_hp', '$keterangan')", $id_mysql);

if($hasil)
echo ("Simpan Pelanggan Berhasil");
else
echo ("Simpan Pelanggan Gagal");

print("<html><head><meta http-equiv='refresh' content='0;url=pelanggan.php'></head><body></body></html>");
?>