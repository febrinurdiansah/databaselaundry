<?php
include "koneksi.php";

if(isset($_POST['id_pelanggan']))
$id_pelanggan=$_POST['id_pelanggan'];

if(isset($_POST['id_transaksi']))
$id_transaksi=$_POST['id_transaksi'];

if(isset($_POST['id_kategori']))
$id_kategori=$_POST['id_kategori'];

if(isset($_POST['jumlah']))
$jumlah=$_POST['jumlah'];

if(isset($_POST['alamat']))
$alamat=$_POST['alamat'];

if(isset($_POST['no_hp']))
$no_hp=$_POST['no_hp'];

$hasil = mysql_query("INSERT INTO cucian (id_transaksi, id_kategori, jumlah) VALUES ('$id_transaksi', '$id_kategori', '$jumlah')", $id_mysql);

if(!$hasil)
echo "Simpan Cucian gagal";
else
echo "Simpan Cucian berhasil";

echo "<html><head><meta http-equiv='refresh' content='0;url=order_masuk2.php?id_transaksi=$id_transaksi&id_pelanggan=$id_pelanggan&alamat=$alamat&no_hp=$no_hp'></head><body></body></html>";

?>