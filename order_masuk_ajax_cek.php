<?php
include "koneksi.php";
$hasil2 = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'", $id_mysql);
$baris2 =mysql_fetch_array($hasil2);

$data_order = array('alamat'   =>   $baris2['alamat'],
                    'no_hp'    =>   $baris2['no_hp'],
					'keterangan'           =>   $baris2['keterangan'],);
echo json_encode($data_order);
?>