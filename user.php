<?php
include "header.php";
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="300" align=center>
<TBODY>
<TR><TD colspan=3 height=40 ><p align="center"><b>TAMBAH USER</b></TD></TR>
<TR><FORM action="user_simpan.php" method="POST">
	<TD width="105">Nama</td><td width="10">:</td>
	<td><input type="text" name="nama"></TD></TR>
<TR><TD>Username</td><td>:</td><td><input type="text" name="username"></TD></TR>
<TR><TD>Password</td><td>:</td><td><input type="password" name="sandi"></TD></TR>
<TR><TD>Jabatan</td><td>:</td><td>
<select name="kode_user">
<option value="">Pilih Jabatan</option>
<option value="admin">Admin</option>
<option value="operator">Operator</option>
</TD></TR>
<TR><td align=center colspan=3><INPUT type=submit value="Tambah User"></td> </FORM></TR>
</TABLE>

<hr width=80% align=center>

<?php
include "user_nama.php";
include "footer.php";
?>