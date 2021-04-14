<?php
include "header.php";
?>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="css/jquery.min.js"></script>
	<script src="css/jquery-ui.min.js"></script>
	<script>
	$(document).ready(function() {
	  $("#datepicker").datepicker();
	});
	</script>
	
	<script>
	$(document).ready(function() {
	  $("#datepicker1").datepicker();
	});
	</script>
	
<TABLE border=0 cellPadding=0 cellSpacing=0 width="450" align=center>
 </TBODY>
 <TR><TD colspan=2 height=40 ><p align="center"><b>DAFTAR PENDAPATAN</b></TD></TR>
 <TR><FORM action="laporan_pendapatan.php" method="POST">
	<TD>Dari Tanggal <input type=text name="tanggal" id="datepicker" size="10"> sampai tanggal <input type=text name="tanggal1" id="datepicker1" size="10"></TD>
	<td><input type=submit value="Cari"></TD></form>
</TR>
<TR><td align=center colspan=4></td></TR>
</TABLE>

<hr width=80% align=center>

<?php
if(isset($_POST['tanggal']) and isset($_POST['tanggal1'])){
$tanggal = $_POST['tanggal'];
$tanggal1 = $_POST['tanggal1'];
include "koneksi.php";

echo "<h2 align=center>PENDAPATAN TANGGAL ";
echo tanggal_indonesia($tanggal);
echo " SAMPAI ";
echo tanggal_indonesia($tanggal1);
echo "</h2>";

//Order masuk
$hasil = mysql_query("SELECT * FROM transaksi,pelanggan WHERE transaksi.id_pelanggan=pelanggan.id_pelanggan and transaksi.status='0' and (transaksi.tanggal_masuk BETWEEN '$tanggal' AND '$tanggal1')",$id_mysql);

if (! $hasil)
	die("Permintaan transaksi order masuk gagal dilaksanakan");
	
echo "<p align=center><b>DAFTAR ORDER MASUK<BR>DARI TANGGAL <font color=red>";
echo tanggal_indonesia($tanggal);
echo "</font> SAMPAI <font color=red>";
echo tanggal_indonesia($tanggal1);
echo "</font></p>";
echo "<table align=center border=1 width=750 cellPadding=0 cellSpacing=0><tr><td width=30 align=center>No</td><td width=30 align=center>No<br>Transaksi</td><td width=250 align=center>Tanggal</td><td width=200 align=center>Nama</td><td width=90 align=center>Jumlah<br>Ongkos</td><td width=90 align=center>Uang muka</td><td width=90 align=center>Kekurangan</td></tr>";
$i=1;
$jml_jumlah_ongkos = 0;
$jml_uang_muka = 0;
$jml_kurang = 0;

	while ( $baris = mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td align=center>$baris[id_transaksi]</td><td>";
echo tanggal_indonesia($baris['tanggal_masuk']);
echo "</td><td>$baris[nama]</td><td align=right>";
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
echo "<td colspan=4 align=center>J u m l a h</td><td align=right>";
echo number_format($jml_jumlah_ongkos,2,',','.');
echo "</td><td align=right>";
echo number_format($jml_uang_muka,2,',','.');
echo "</td><td align=right>";
echo number_format($jml_kurang,2,',','.');
echo "</td></tr>";
echo "</table><br>";

$setor_order_masuk = $jml_uang_muka;
echo "Yang harus disetor = ";
echo number_format($jml_uang_muka,2,',','.'); 
echo "<br>";

//Order keluar
$hasil = mysql_query("SELECT * FROM transaksi,pelanggan WHERE transaksi.id_pelanggan=pelanggan.id_pelanggan and transaksi.status='1' and (transaksi.tanggal_ambil BETWEEN '$tanggal' AND '$tanggal1')",$id_mysql);
if (! $hasil)
	die("Permintaan transaksi order keluar gagal dilaksanakan");
	
echo "<p align=center><b>DAFTAR ORDER KELUAR<BR>TANGGAL <font color=red>";
echo tanggal_indonesia($tanggal);
echo "</font> SAMPAI <font color=red>";
echo tanggal_indonesia($tanggal1);
echo "</font></p>";

echo "<table align=center border=1 width=750 cellPadding=0 cellSpacing=0><tr><td width=30 align=center>No</td><td width=30 align=center>No<br>Transaksi</td><td width=250 align=center>Tanggal</td><td width=200 align=center>Nama</td><td width=90 align=center>Jumlah<br>Ongkos</td><td width=90 align=center>Uang muka</td><td width=90 align=center>Pelunasan</td></tr>";
$i=1;
$jml_jumlah_ongkos = 0;
$jml_uang_muka = 0;
$jml_kurang = 0;
	
	while ( $baris=mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td align=center>$baris[id_transaksi]</td><td>";
echo tanggal_indonesia($baris['tanggal_ambil']);
echo "</td><td>$baris[nama]</td><td align=right>";
echo number_format($baris['jumlah_ongkos'],2,',','.');
echo "</td><td align=right>";
echo number_format($baris['jumlah_ongkos'],2,',','.');
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
echo "<td colspan=4 align=center>J u m l a h</td><td align=right>";
echo number_format($jml_jumlah_ongkos,2,',','.');
echo "</td><td align=right>";
echo number_format($jml_uang_muka,2,',','.');
echo "</td><td align=right>";
echo number_format($jml_kurang,2,',','.');
echo "</td></tr>";
echo "</table><br>";

$setor_order_keluar = $jml_kurang;
echo "Yang harus disetor = ";
echo number_format($setor_order_keluar,2,',','.');
echo "<br>";

$pendapatan = $setor_order_masuk + $setor_order_keluar;

echo "Jumlah setoran tanggal ";
echo tanggal_indonesia($tanggal);
echo " sampai tanggal ";
echo tanggal_indonesia($tanggal1);
echo " adalah ";
echo number_format($pendapatan,2,',','.');
echo "<br>";

echo "<table border='0' width='750' align='center'><tr><td width='480'>&nbsp;</td><td align=center>Wonosari, ";
echo tanggal_indonesia($tanggal);
echo "<br>Petugas<br><br>";
echo nama_admin($id_user);
echo "</td></tr></table>";

mysql_close($id_mysql);
}
include "footer.php";
?>