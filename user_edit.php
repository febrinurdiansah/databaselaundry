<?php
include "header.php";
include "koneksi.php";

if(isset($_GET['id_user']))
$id_user = $_GET['id_user'];

$hasil = mysql_query("SELECT * FROM user WHERE id_user='$id_user'",$id_mysql);

if (! $hasil)
	die("Permintaan user gagal dilaksanakan");

while ( $baris = mysql_fetch_array($hasil)){
?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>EDIT USER</b></TD></TR>
 <FORM action="user_edit_simpan.php" method="POST">
 <TR>
 <TD width="100">Nama</td><td width="10">:</td><td><input type=text name="nama" value='<?php echo "$baris[nama]"; ?>'></TD>
 </TR>
 <TR>
 <TD>Username</td><td>:</td><td><input type="text" name="username" value='<?php echo "$baris[username]"; ?>'></TD>
 </TR>
 <TR>
 <TD>Password</td><td>:</td><td><input type="password" name="sandi"></TD>
 </TR>
<input type="hidden" name="id_user" value='<?php echo "$baris[id_user]"; ?>'>
<input type="hidden" name="sandi_asli" value='<?php echo "$baris[password]"; ?>'>
 <TD>Kode User</td><td>:</td><td>
 <select name="kode_user">
 <option value="">Pilih Kode User</option>
 <option value="admin" <?php if($baris['kode_user']=="admin") echo "SELECTED"; ?> >Admin</option>
 <option value="operator" <?php if($baris['kode_user']=="operator") echo "SELECTED"; ?> >Operator</option>
 </select>
 </TD>
 </TR>
 
 <TR>
 </td><td align=center colspan=3><INPUT type=submit value="Edit User"></td> 
 </FORM>
 </TR>
</TABLE>
<hr width=80% align=center>

<?php
}
include "user_nama.php";
include "footer.php";
?>


