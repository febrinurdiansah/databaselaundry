<?php
include "koneksi.php";
$hasil3 = mysql_query("SELECT * FROM list_kategori WHERE id_kategori='$_GET[id_kategori]'", $id_mysql);
$baris3 = mysql_fetch_array($hasil3);

$data_order = array('kategori'   =>   $baris3['kategori'],
                    'ongkos'     =>   $baris3['ongkos'],);
echo json_encode($data_order);
?>