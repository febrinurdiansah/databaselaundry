<?php
include "header.php";
include "koneksi.php";

if(isset($_GET['id_kategori']))
$id_kategori = $_GET['id_kategori'];

$hasil = mysql_query("SELECT * FROM list_kategori WHERE id_kategori='$id_kategori'",$id_mysql);

if (! $hasil)
	die("Permintaan user gagal dilaksanakan");

While ( $baris = mysql_fetch_array($hasil)){
  ?>
<table border=0 cellpadding=0 cellspacing=0 width="400" align=center>
<tbody>
<tr><td  colspan=3 height=40 ><p align="center"><b>EDIT KATEGORI</b></td></tr>
<FORM action="kategori_edit_simpan.php" method="POST">
<tr>
<td width="100">Kategori</td><td width="10">:</td><td><input type=text name="kategori" value='<?php echo "$baris[kategori]"; ?>'></td>
</tr>
<tr>
<td>Ongkos</td><td>:</td><td><input type=text name="ongkos" value='<?php echo "$baris[ongkos]"; ?>'></td>
</tr>
<tr>
<td>Keterangan</td><td>:</td><td><input type=text name="keterangan" value='<?php echo "$baris[keterangan]"; ?>'></td>
</tr>
<input type="hidden" name="id_kategori" value='<?php echo "$baris[id_kategori]"; ?>'>
</tr>

<tr>
</td><td align=center colspan=3><INPUT type=submit value="Edit Kategori"></td>
</Form>
</tr>
</table>
<hr width=80% align=center>

<?php
}
include "kategori_nama.php";
include "footer.php";
?>

	
