<?php
//Fungsi ini dibuat oleh smk yappi gunungkidul 7 januari 2020
/*Isi Fungsi
1. mencari nama admin bedasarkan id			20
2a. Membuat drop down plenggan				37
2b. Menampilkan nama pelanggan dari id_pelanggan		50
2c.Menampilkan nama pelanggan dari id transaksi 62
3a. Membuat drop down kategori				62
3b. Menampilkan ongkos dari id_kategori		78
3c. Menampilkan cucian dari id_kategori		78
3d. Menampilkan cucian dari id_kategori		91
4.  Merubah format tanggal 					104
5a. Menampilkan jumlah ongkos dari id_transaksi 152
5b. Menampilkan uang muka dari id_transaksi 165
6. Menampilkan terbilang					




*/
//1. mencari nama admin berdasarkan id		20
function nama_admin($id){
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM user WHERE id_user='$id'",$id_mysql);
  if (! $hasil)
	 die("Permintaan mencari admin gagal dilaksanakan");
 
 while ( $baris = mysql_fetch_array($hasil) )
{
return $baris['nama'];
}
}

//1b membuat dropdown operator
function drop_operator()
{
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM user WHERE kode_user='operator' ORDER BY nama", $id_mysql);
	if (! $hasil)
	  die("Permintaan pelanggan gagal dilsanakan");
echo "<option value=''>Pilih operator</option>";
 while  ( $baris = mysql_fetch_array($hasil) )
{
echo "<option value=$baris[id_user]>$baris[nama]</option>";
}	  
}


//2a. Membuat drop down pelanggan
function drop_down_pelanggan()
	{
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM pelanggan ORDER BY nama", $id_mysql);
	if (! $hasil)
	  die("Permintaan pelanggan gagal dilsanakan");
echo "<option value=''>Pilih pelanggan</option>";
 while  ( $baris = mysql_fetch_array($hasil) )
{
echo "<option value=$baris[id_pelanggan]>$baris[nama]</option>";
}	  
}

//2b. Menampilkan nama pelanggan dari id_pelanggan 50
function nama_pelanggan($id){
include "koneksi.php";

$hasil1 = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'", $id_mysql);
  if (! $hasil1)
	die("Mencari nama pelnggan gagal dilaksanakan");
$baris = mysql_fetch_array($hasil1);
return $baris['nama'];
}

//2c.Menampilkan nama pelanggan dari id transaksi 62
function nama_pelanggan_transaksi($id){
	include "koneksi.php";

$hasil = mysql_query("SELECT * FROM pelanggan,transaksi WHERE transaksi.id_transaksi='$id' and transaksi.id_pelanggan=pelanggan.id_pelanggan",$id_mysql);
if (! $hasil)
die ("Permintaan nama pelanggan transaksi gagal di laksanakan");
$baris = mysql_fetch_array($hasil);
return $baris['nama'];
}
//3a. Membuat drop down kategori
function drop_down_kategori()
	{
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM list_kategori ORDER BY kategori", $id_mysql);
	if (! $hasil)
	  die("Permintaan pelanggan gagal dilsanakan");
echo "<option value=''>Pilih Kategori Cucian</option>";
 while  ( $baris = mysql_fetch_array($hasil) )
 {
echo "<option value=$baris[id_kategori]>$baris[kategori]</option>";	
}
}


//3b. Menampilkan ongkos dari id_kategori
 function ongkos($id){
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM list_kategori WHERE id_kategori='$id'", $id_mysql);
  if (! $hasil)
	die("Mencari ongkos gagal dilaksanakan");

$baris = mysql_fetch_array($hasil);
return $baris['ongkos'];
}


//3d. Menampilkan cucian dari id_kategori		91
function cucian($id){
include "koneksi.php";

$hasil1 = mysql_query("SELECT * FROM list_kategori WHERE id_kategori='$id'", $id_mysql);
  if (! $hasil1)
	die("Permintaan ongkos gagal dilaksanakan");

$baris = mysql_fetch_array($hasil1);
return $baris['kategori'];
}


//4. Merubah format tanggal		104
function tanggal_indonesia($tanggalan)
{
$tahun=substr($tanggalan,0,4);
$bulan=substr($tanggalan,5,2);
$tanggal=substr($tanggalan,8,2);

echo "$tanggal ";

if($bulan=='01')
	echo "Januari ";
if($bulan=='02')
	echo "Februari ";
if($bulan=='03')
	echo "Maret ";
if($bulan=='04')
	echo "April ";
if($bulan=='05')
	echo "Mei ";
if($bulan=='06')
	echo "Juni ";
if($bulan=='07')
	echo "Juli ";
if($bulan=='08')
	echo "Agustus ";
if($bulan=='09')
	echo "September ";
if($bulan=='10')
	echo "Oktober ";
if($bulan=='11')
	echo "November ";
if($bulan=='12')
	echo "Desember ";

echo "$tahun";
}


//5a. Menampilkan jumlah ongkos dari id_transaksi 152
function jumlah_ongkos($id){
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$id'",$id_mysql);
if (! $hasil)
	die ("permintaan jumlah ongkos gagal dilaksanakan");

$baris = mysql_fetch_array($hasil);
return $baris['jumlah_ongkos'];
}


//5b. Menampilkan uang muka dari id_transaksi 165
function uang_muka($id){
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$id'",$id_mysql);
if (!$hasil)
die ("permintaan uang muka gagal dilaksanakan");

$baris = mysql_fetch_array($hasil);
return $baris['uang_muka'];
}


//6. menampilkan terbilang
function terbilang($nilai){
	$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	 if($nilai==0){
	 	return "";
	 }elseif ($nilai < 12&$nilai!=0) {
		 return "" . $huruf[$nilai];
	 }elseif ($nilai < 20) {
		 return terbilang ($nilai - 10) . " Belas ";
	 }elseif ($nilai < 100) {
		 return terbilang ($nilai / 10) . " Puluh " . terbilang($nilai % 10);	
	 }elseif ($nilai < 200) {
		 return " Seratus ". terbilang($nilai - 100);	
	 }elseif ($nilai < 1000) {
		 return terbilang ($nilai / 100) . " Ratus " . terbilang($nilai % 100);
	 }elseif ($nilai < 2000) {
		 return " Seribu ". terbilang($nilai - 1000);
	 }elseif ($nilai < 1000000) {
		 return terbilang ($nilai / 1000) . " Ribu " . terbilang($nilai % 1000);
	 }elseif ($nilai < 1000000000) {
		 return terbilang ($nilai / 1000000) . " Juta " . terbilang($nilai % 1000000);
	 }elseif ($nilai < 1000000000000) {
		 return terbilang ($nilai / 1000000000) . " Miliyar " . terbilang($nilai % 1000000000);
	}elseif ($nilai < 100000000000000) {
		 return terbilang ($nilai / 1000000000000) . " Triliyun " . terbilang($nilai % 1000000000000);	
	 }elseif ($nilai <= 100000000000000) {
		 return "Maaf tidak dapat di proses karena jumlah nilai terlalu besar";
	 }
	 }
 
?>