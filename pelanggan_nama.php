<?php
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM pelanggan",$id_mysql);
if (! $hasil)
	die ("Permintaan pelanggan gagal dilaksanakan");
	
echo "<p align=center><b>DAFTAR PELANGGAN</p>";
echo "<table align=center border=1 width=850 cellpadding=0 cellspacing=0><tr><td width=30 align=center>No</td><td width=300 align=center>Nama</td><td width=300 align=center>Alamat</td><td width=125 align=center>No.Hp</td><td width=200 align=center>Keterangan</td><td width=130 align=center>Aksi</td></tr>";
$i=1;
	while ( $baris = mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td>$baris[nama]</td><td>";
echo "$baris[alamat]</td><td>$baris[no_hp]</td><td>$baris[keterangan]</td><td align=center>";
echo "<a href='pelanggan_edit.php?id_pelanggan=$baris[id_pelanggan]'>Edit</a> | "; 
?> 
<a href='pelanggan_hapus.php?id_pelanggan=<?php echo "$baris[id_pelanggan]"; ?>' onclick="return confirm('Yakin Hapus?')">Hapus</a></td></tr>
<?php
	$i++;
}
echo "</table><br>";
mysql_close($id_mysql);
?>