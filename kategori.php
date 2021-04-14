<?php
include "header.php";
?>
<table border=0 cellpadding=0 cellspacing=0 width="300" align=center>
<tbody>
<tr><td colspan=3 height=40 ><p align="center"><b>TAMBAH KATEGORI</b></td></tr>
<tr><FORM action="kategori_simpan.php" method="POST">
<tr><td>Kategori</td><td>:</td><td><input type="text" name="kategori"></td></tr>
<tr><td>Ongkos</td><td>:</td><td><input type="text" name="ongkos"></td></tr>
<tr><td>Keterangan</td><td>:</td><td><input type="text" name="keterangan"></td></tr>
<tr><td align=center colspan=3><INPUT type=submit value="Tambah Kategori"></td></FORM></tr>
</table>

<hr width=80% align=center>

<?php
include "kategori_nama.php";
include "footer.php";
?>