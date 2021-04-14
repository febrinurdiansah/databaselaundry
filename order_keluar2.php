<?php
include "header.php";
include "koneksi.php";
//include "fungsi.php";

if(isset($_GET['id_transaksi']))
$id_transaksi=$_GET['id_transaksi'];

if(isset($_GET['id_pelanggan']))
$id_pelanggan=$_GET['id_pelanggan'];

if(isset($_GET['nama_pelanggan']))
$nama_pelanggan=$_GET['nama_pelanggan'];

if(isset($_GET['alamat']))
$alamat=$_GET['alamat'];
?>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>ORDER KELUAR</b></p></TD></TR>
 <TR>
     <TD width="180">Nomor Transaksi/Nota</td><td width="10">:</td>
	 <td width="210"><?php echo "$id_transaksi"; ?>
	 </TD></TR>
 <tr><td>Nama Pelanggan</td><td>:</td><td>
     <?php echo nama_pelanggan_transaksi($id_transaksi); ?>
	 </td></tr>
</table>
<br>

<hr width=80% align=center>

<?php
$hasil1 = mysql_query("SELECT * FROM cucian WHERE id_transaksi='$id_transaksi'", $id_mysql);
if(!$hasil1)
die("Menampilkan nota gagal");

echo "<form action='order_keluar_cetak.php' method='GET' name='myform'>";

echo "<p align='center'><b>ORDER LOUNDRY</b></p>";
echo "<table border='1' width='500' align='center'><tr><td width='15' align='center'>No</td><td align='center'>Cucian</td><td align='center'>Ongkos</td><td align='center'>Jumlah</td><td align='center'>Jumlah Ongkos</td><tr>";
$n=1;
$ongkos=0;
$jumlah_ongkos=0;
$jml=0;
 while ( $baris = mysql_fetch_array($hasil1) )
{
echo "<tr><td>$n</td><td>";
echo cucian($baris['id_kategori']);
echo "</td><td align='right'>";
$ongkos = ongkos($baris['id_kategori']);
echo number_format($ongkos,2,',','.');
echo "</td><td align='center'>$baris[jumlah]</td><td align='right'>";
$jumlah_ongkos = $baris['jumlah'] * $ongkos;
echo number_format($jumlah_ongkos,2,',','.');
echo "</td></tr>";
$n++;
}
echo "<tr><td colspan=4 align='center'>J u m l a h</td><td align='right'>";
$jml_ongkos = jumlah_ongkos($id_transaksi);
echo number_format($jml_ongkos,2,',','.');
echo "</td></tr>";
echo "<tr><td colspan=4 align='center'>Uang muka</td><td align='right'>";

$uang_muka = uang_muka($id_transaksi);
echo number_format($uang_muka,2,',','.');
echo "</td></tr>";
echo "<tr><td colspan=4 align='center'>Pelunasan</td><td align='right'>";
$pelunasan = $jml_ongkos - $uang_muka;

echo "<input type=text name=pelunasan value='$pelunasan' size=10>";
echo "</td></tr>";

echo "</table>";
echo "<input type=hidden name=id_transaksi value=$id_transaksi>";
?>

<p align=center><input type="submit" name="subpopup" value="Cetak Nota"
   onclick="myform.target='POPUPW'; POPUPW = window.open(
   'about:blank','POPUPW','width=600,height=600');"></p>
</form>

<?php
include "footer.php";
?>