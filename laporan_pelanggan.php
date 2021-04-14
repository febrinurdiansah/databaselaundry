<?php
include "header.php";
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="350" align=center>
		<TBODY>
		<tr><td colspan=4 height=40 ><P align="center"><b>MENCARI PELANGGAN</b></td></tr>
		<tr><form action="laporan_pelanggan.php" method="POST">
			<td width="105">Nama</td><td width="10">:</td>
			<td><input type=text name="var">
			<input type="hidden" name="kolom" value="nama"></td>
			<td><input type=submit value="Cari"></td></form>
	</tr>
	<tr><form action="laporan_pelanggan.php" method="POST">
		<td>Alamat</td><td>:</td>
		<td><input type="text" name="var"></td>
		<input type="hidden" name="kolom" value="alamat"></td>
		<td><input type=submit value="Cari"></td></form>
	</tr>
	<tr><form action="laporan_pelanggan.php" method="POST">
		<td>No HP</td><td>:</td>
		<td><input type="text" name="var"></td>
		<input type="hidden" name="kolom" value="no_hp"></td>
		<td><input type=submit value="Cari"></td></form>
	</tr>
	<tr><form action="laporan_pelanggan.php" method="POST">
		<td>Keterangan</td><td>:</td>
		<td><input type="text" name="var"></td>
		<input type="hidden" name="kolom" value="keterangan"></td>
		<td><input type=submit value="Cari"></td></form>
	</tr>
	<tr><td align=center colspan=4><INPUT type=submit value="Cari Pelanggan"></td></form></tr>
</TABLE>

<hr width=80% align=center>

<?php

if(isset($_POST['var']) and isset($_POST['kolom'])){
$var = $_POST['var'];
$kolom = $_POST['kolom'];

include "koneksi.php";

$hasil = mysql_query("SELECT * FROM pelanggan WHERE $kolom LIKE '%$var%'",$id_mysql);
if (! $hasil)
	die("Permintaan pelanggan gagal dilaksanakan");

echo "<p align=center><b>DAFTAR PELANGGAN<BR>BEDASARKAN <font color=red>";
echo strtoupper($kolom);
echo "</font> DENGAN KATA KUNCI <font color=red>";
echo strtoupper($var);
echo "</font></p>";
echo "<table align=center border=1 width=750 cellPadding=0 cellSpacing=0><tr><td width=30 align=center>No</td><td width=180 align=center>Nama</td><td width=250 align=center>Alamat</td><td width=120 align=center>No HP</td><td width=200 align=center>Keterangan</td></tr>";
$i=1;
	while ( $baris = mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td>$baris[nama]</td>";
echo "<td>$baris[alamat]</td><td>$baris[no_hp]</td>";
echo "<td>$baris[keterangan]</td></tr>";
	$i++;
}
echo "</table><br>";
mysql_close($id_mysql);
}

include "footer.php";
?>