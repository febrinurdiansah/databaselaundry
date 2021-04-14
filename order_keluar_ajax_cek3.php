<?php
include "koneksi.php";
$hasil3 = mysql_query("SELECT * FROM pelanggan,transaksi WHERE pelanggan.id_pelanggan=transaksi.id_pelanggan and transaksi.id_transaksi='$_GET[id_transaksi]'", $id_mysql);
$baris3 = mysql_fetch_array($hasil3);

$data_order = array('id_transaksi1'   =>   $baris3['id_transaksi'],
                    'alamat'     =>   $baris3['alamat'],
					'no_hp'     =>   $baris3['no_hp'],
					'keterangan'     =>   $baris3['keterangan'],
					'tanggal_masuk'     =>   $baris3['tanggal_masuk'],
					'tanggal_selesai'   =>   $baris3['tanggal_selesai'],);
					
echo json_encode($data_order);
?>