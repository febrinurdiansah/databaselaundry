<?php
if(isset($_GET['id_kategori']))
$id_kategori = $_GET['id_kategori'];

echo "id_kategori=$id_kategori<br>";

include "koneksi.php";
$hasil = mysql_query("DELETE FROM list_kategori WHERE id_kategori='$id_kategori'", $id_mysql);

if($hasil)
echo ("Hapus user Berhasil");
else
echo ("Hapus user Gagal");

print("<html><head><meta http-equiv='refresh' content='0;url=kategori.php'></head><body></body></html>");
?>