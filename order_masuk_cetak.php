<html>
<head>
<title>Nota Loundri</title>
</head>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function printPage() {
if (window.print) {
agree = confirm('Apakah Akan Mencetak Nota?');
if (agree) window.print();
   }
}
</script>
<body OnLoad="printPage()">

<?php
include "cek_user.php";
if(isset($_GET['id_transaksi']))
$id_transaksi=$_GET['id_transaksi'];

if(isset($_GET['uang_muka']))
$uang_muka=$_GET['uang_muka'];

include "koneksi.php";
include "fungsi.php";

$hasil = mysql_query("SELECT * FROM transaksi, pelanggan WHERE transaksi.id_transaksi='$id_transaksi' and transaksi.id_pelanggan=pelanggan.id_pelanggan", $id_mysql);
if(!$hasil)
die("Menampilkan pelanggan transaksi gagal");

while ( $baris = mysql_fetch_array($hasil) )
{
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>Nota Loundri<br>ORDER MASUK<br>CV Febri Nurdiansah</b></TD></TR>
 <TR>
    <TD width="200">ID Transaksi/Nota</td><td width="10">:</td>
	<td align=left><?php echo "$id_transaksi"; ?>
	</TD></TR>
 <tr><td>Nama pelanggan</td><td>:</td><td>
    <?php echo $baris['nama']; ?>
	</td></tr>
 <tr><td>Alamat</td><td>:</td><td><?php echo $baris['alamat']; ?></td></tr>
 <tr><td>No HP</td><td>:</td><td><?php echo $baris['no_hp']; ?></td></tr>
 <tr><td>Tanggal masuk</td><td>:</td><td><?php echo tanggal_indonesia($baris['tanggal_masuk']); ?></td></tr>
 <tr><td>Tanggal selesai</td><td>:</td><td><?php echo tanggal_indonesia($baris['tanggal_selesai']); ?></td></tr>
</table>
 
<?php
$tanggal_masuk = $baris['tanggal_masuk'];
}

$hasil1 = mysql_query("SELECT * FROM cucian WHERE id_transaksi='$id_transaksi'", $id_mysql);
if(!$hasil1)
die("Menampilkan nota gagal");

echo "<table border='1' width='500' align='center'><tr><td width='15' align='center'>No</td><td align='center'>Cucian</td><td align='center'>Ongkos</td><td align='center'>Jumlah</td><td align='center'>Jumlah Ongkos</td><tr>";
$n=1;
$ongkos=0;
$jumlah_ongkos=0;
 while ( $baris = mysql_fetch_array($hasil1) )
{
echo "<tr><td>$n</td><td>";
echo cucian($baris['id_kategori']);
echo "</td><td align='right'>";
$ongkos = ongkos($baris['id_kategori']);
echo number_format($ongkos,2,',','.');
echo "</td><td align='center'>$baris[jumlah]</td><td align='right'>";
$jumlah_ongkos = $baris['jumlah'] * $ongkos;
echo number_format($jumlah_ongkos,2,',','.');
echo "</td></tr>";

if($n==1)
    $jml = $jumlah_ongkos;
	else
	$jml = $jml + $jumlah_ongkos;
$n++;

}
echo "<tr><td colspan=4 align='center'>J u m l a h</td><td align='right'>";
echo number_format($jml,2,',','.');
echo "</td></tr>";
echo "<tr><td colspan=4 align='center'>Uang muka</td><td align='right'>";
echo number_format($uang_muka,2,',','.');
echo "</td></tr>";
$kekurangan = $jml - $uang_muka;
echo "<tr><td colspan=4 align='center'>Kekurangan</td><td align='right'>";
echo number_format($kekurangan,2,',','.');
echo "</td></tr>";
echo "</table>";
echo "<table border='0' width='500' align='center'><tr><td width='280'>&nbsp;</td><td align=center> Wonosari, ";
echo tanggal_indonesia($tanggal_masuk);
echo "<br>Kasir<br><br>";
echo nama_admin($id_user);
echo "</td></tr></table>";

$hasil2 = mysql_query("UPDATE transaksi SET jumlah_ongkos='$jml', uang_muka='$uang_muka' WHERE id_transaksi='$id_transaksi'", $id_mysql);

if(!$hasil2)
die("UPDATE tabel transaksi gagal");
?>
</body>
</html>