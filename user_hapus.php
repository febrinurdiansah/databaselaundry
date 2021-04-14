<?php
if(isset($_GET['id_user']))
$id_user = $_GET['id_user'];

echo "id_user=$id_user<br>";

include "koneksi.php";
$hasil = mysql_query("DELETE FROM user WHERE id_user='$id_user'",$id_mysql);

if($hasil)
echo ("Hapus User Berhasil");
else
echo ("Hapus User Gagal");

print("<html><head><meta http-equiv='refresh' content='0;url=user.php'></head><body></body></html>");
?>