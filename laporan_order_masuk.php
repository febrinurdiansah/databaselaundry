<?php
include "header.php";
?>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="css/jquery.min.js"></script>
<script src="css/jquery-ui.min.js"></script>
<script>
$ (document).ready(function() {
	$("#datepicker").datepicker();
});
</script>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="300" align=center>
<TBODY>
	<TR><TD colspan=3 height=40 ><p align="center"><b><b>DAFTAR ORDER MASUK</b></TD></TR>
	<TR><form action="laporan_order_masuk.php" method="POST">
		<TD width="105">Tanggal</td><td width="10">:</td>
		<td><input type=text name="tanggal" id="datepicker" size="10">
		<td><input type=submit value="Cari"></td></form>
	</tr>
<tr><td align=center colspan=4></td></tr>
</table>

<hr width=80% align=center>

<?php
if(isset($_POST['tanggal'])){
$tanggal = $_POST['tanggal'];

include "koneksi.php";

$hasil = mysql_query("SELECT * FROM transaksi,pelanggan WHERE transaksi.id_pelanggan=pelanggan.id_pelanggan and transaksi.status='0' and transaksi.tanggal_masuk LIKE '$tanggal'",$id_mysql);
if (! $hasil)
	die("Permintaan transaksi order masuk gagal dilaksanakan");

echo "<p align=center><b>DAFTAR ORDER MASUK<BR>TANGGAL <font color=red>";
echo tanggal_indonesia($tanggal);
echo "</font></p>";
echo "<table align=center border=1 width=750 cellpadding=0 cellspacing=0><tr><td width=30 align=center>No</td><td width=30 align=center>No<br>Transaksi</td><td width=200 align=center>Nama</td><td width=250 align=center>Alamat</td><td width=90 align=center>Jumlah<br>Ongkos</td><td width=90 align=center>Uang Muka</td><td width=200 align=center>Kekurangan</td></tr>";
$i=1;
$jml_jumlah_ongkos = 0;
$jml_uang_muka = 0;
$jml_kurang = 0;

while ( $baris = mysql_fetch_array($hasil)){
	echo "<tr><td align=center>$i</td><td align=center>$baris[id_transaksi]</td><td>$baris[nama]</td>";
	echo "<td>$baris[alamat]</td><td align=right>";
	echo number_format($baris['jumlah_ongkos'],2,',','.');
	echo "</td><td align=right>";
	echo number_format($baris['uang_muka'],2,',','.');
	$kurang = $baris['jumlah_ongkos'] - $baris['uang_muka'];
	echo "</td><td align=right>";
	echo number_format($kurang,2,',','.');
	echo "</td></tr>";
	
	 if($i==1){
	$jml_jumlah_ongkos = $baris['jumlah_ongkos'];
	$jml_uang_muka = $baris['uang_muka'];
	$jml_kurang = $kurang;
}
else
{
	$jml_jumlah_ongkos = $jml_jumlah_ongkos + $baris['jumlah_ongkos'];
	$jml_uang_muka = $jml_uang_muka + $baris['uang_muka'];
	$jml_kurang = $jml_kurang + $kurang;
}
	$i++;
}
echo "<tr><td colspan=4 align='center'>J u m l a h</td><td align='right'>";
echo number_format($jml_jumlah_ongkos,2,',','.');
echo "</td><td align=right>";
echo number_format($jml_uang_muka,2,',','.');;
echo "</td><td align=right>";
echo number_format($jml_kurang,2,',','.');
echo "</td></tr>";
echo "</table><br>";

echo "<TABLE border='0' width='750' align-'center'><tr><td width='480'>&nbsp;</td><td align=center>Wonosari, ";
echo tanggal_indonesia($tanggal);
echo "<br>Petugas<br><br>";
echo nama_admin($id_user);
echo "</td></tr></table>";

mysql_close($id_mysql);
}
include "footer.php";
?>