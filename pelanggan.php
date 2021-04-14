<?php
include "header.php";
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="300" align=center>
<TBODY>
<TR><TD colspan=3 height=40 ><p align="center"><b>TAMBAH PELANGGAN</b></TD></TR>
<TR><FORM action="pelanggan_simpan.php" method="POST">
	<TD width="200">Nama</td><td width="10">:</td>
	<td><input type="text" name="nama"><br></TD></TR>
<TR><TD>Alamat</td><td>:</td><td><input type="text" name="alamat"><br></TD></TR>
<TR><TD>No.Hp</td><td>:</td><td><input type="text" name="no_hp"><br></TD></TR>
<TR><TD>Keterangan</td><td>:</td><td><input type="text" name="keterangan"><br></TD></TR>
<TR><td align=center colspan=3><INPUT type=submit value="Tambah Pelanggan"></td> </FORM></TR>
</TABLE>

<hr width=80% align=center>

<?php
include "pelanggan_nama.php";
include "footer.php";
?>