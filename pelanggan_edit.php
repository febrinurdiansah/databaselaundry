<?php
include "header.php";
include "koneksi.php";

if(isset($_GET['id_pelanggan']))
$id_pelanggan = $_GET['id_pelanggan'];

$hasil = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'",$id_mysql);

if (! $hasil)
	die("Permintaan pelanggan gagal dilaksanakan");

while ( $baris = mysql_fetch_array($hasil)){
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>EDIT PELANGGAN</b></TD></TR>
 <FORM action="pelanggan_edit_simpan.php" method="POST">
 <TR>
 <TD width="100">Nama</td><td width="10">:</td><td><input type=text name="nama" value='<?php echo "$baris[nama]"; ?>'></TD>
 </TR>
 <TR>
 <TD>Alamat</td><td>:</td><td><input type="text" name="alamat" value='<?php echo "$baris[alamat]"; ?>'></TD>
 </TR>
<TR>
 <TD>No.Hp</td><td>:</td><td><input type="text" name="no_hp" value='<?php echo "$baris[no_hp]"; ?>'></TD>
 </TR>
<TR>
 <TD>Keterangan</td><td>:</td><td><input type="text" name="keterangan" value='<?php echo "$baris[keterangan]"; ?>'></TD>
 </TR>
<input type="hidden" name="id_pelanggan" value='<?php echo "$baris[id_pelanggan]"; ?>'>
 <TR>
 </td><td align=center colspan=3><INPUT type=submit value="Edit Pelanggan"></td> 
 </FORM>
 </TR>
</TABLE>
<hr width=80% align=center>

<?php
}
include "pelanggan_nama.php";
include "footer.php";
?>


