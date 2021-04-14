<?php
if(isset($_GET['id_pelanggan']))
$id_pelanggan = $_GET['id_pelanggan'];

echo "id_pelanggan=$id_pelanggan<br>";

include "koneksi.php";
$hasil = mysql_query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'",$id_mysql);

if($hasil)
echo ("Hapus Pelanggan Berhasil");
else
echo ("Hapus Pelanggan Gagal");

print("<html><head><meta http-equiv='refresh' content='0;url=pelanggan.php'></head><body></body></html>");
?>