<?php
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM list_kategori",$id_mysql);
if (! $hasil)
	die("Permintaan user gagal dilaksanakan");

echo "<p align=center><b>Daftar User</p>";
echo "<table align=center border=1 width=700 cellpadding=0 cellspacing=0><tr><td width=30 align=center>No</td><td width=200 align=center>Kategori</td><td width=170 align=center>Ongkos</td><td width=170 align=center>Keterangan</td><td align=center>Aksi</td></tr>";
$i=1;
  while ( $baris = mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td>$baris[kategori]</td><td>";
echo "$baris[ongkos]</td><td>$baris[keterangan]</td><td align=center>";
echo "<a href='kategori_edit.php?id_kategori=$baris[id_kategori]'>Edit</a> | ";
?>
<a href='kategori_hapus.php?id_kategori=<?php echo "$baris[id_kategori]"; ?>' onclick="return confirm('Yakin Hapus?')">Hapus</a></td></tr>
<?php
	$i++;
	  }
echo "</table><br>";
mysql_close($id_mysql);
?>