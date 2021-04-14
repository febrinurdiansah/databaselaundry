<?php
include "koneksi.php";

$hasil = mysql_query("SELECT * FROM user",$id_mysql);
if (! $hasil)
	die ("Permintaan user gagal dilaksanakan");
	
echo "<p align=center><b>DAFTAR USER</p>";
echo "<table align=center border=1 width=700 cellpadding=0 cellspacing=0><tr><td width=30 align=center>No</td><td width=200 align=center>Nama</td><td width=170 align=center>Username</td><td width=170 align=center>Kode User</td><td align=center>Aksi</td></tr>";
$i=1;
	while ( $baris = mysql_fetch_array($hasil)){
echo "<tr><td align=center>$i</td><td>$baris[nama]</td><td>";
echo "$baris[username]</td><td>$baris[kode_user]</td><td align=center>";
echo "<a href='user_edit.php?id_user=$baris[id_user]'>Edit</a> | "; 
?> 
<a href='user_hapus.php?id_user=<?php echo "$baris[id_user]"; ?>' onclick="return confirm('Yakin Hapus?')">Hapus</a></td></tr>
<?php
	$i++;
}
echo "</table><br>";
mysql_close($id_mysql);
?>