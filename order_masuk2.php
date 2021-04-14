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

if(isset($_GET['no_hp']))
$no_hp=$_GET['no_hp'];

if(isset($_GET['keterangan']))
$keterangan=$_GET['keterangan'];

if(isset($_GET['tanggal_masuk']))
$tanggal_masuk=$_GET['tanggal_masuk'];

if(isset($_GET['tanggal_selesai'])){
$tanggal_selesai=$_GET['tanggal_selesai'];
$aksi = mysql_query("UPDATE transaksi SET id_pelanggan='$id_pelanggan' WHERE id_transaksi='$id_transaksi'", $id_mysql);
if(! $aksi)
    die("UPDATE data transaksi gagal");
}
//echo "tanggal_selesai=$tanggal_selesai";
?>

<script language="javacsript" type="text/javascript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,satusbar=0,menubar=0,resizable=0,width=550,height=400,top=80');");
}
</script>

<form action='order_masuk2_simpan.php' method='POST'>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>ORDER MASUK</b></p></TD></TR>
 <TR>
     <TD width="180">Nomor Transaksi/Nota</td><td width="10">:</td>
	 <td width="210"><?php echo "$id_transaksi"; ?>
	 </TD></TR>
 <tr><td>Nama pelanggan</td><td>:</td><td>
     <?php echo nama_pelanggan($id_pelanggan); ?>
	 </td></tr>
 <tr><td>Alamat</td><td>:</td><td><?php echo "$alamat"; ?></td></tr>
 <tr><td>No HP</td><td>:</td><td><?php echo "$no_hp"; ?></td></tr>
</table>
<br>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
     function cek_database1(){
	    var id_kategori = $("#id_kategori").val();
		$.ajax({
		    url: 'order_masuk_ajax_cek1.php',
			data:"id_kategori="+id_kategori ,
			
		}).success(function (data) {
		    var json = data,
			obj = JSON.parse(json);
			$('#kategori').val(obj.kategori);
			$('#ongkos').val(obj.ongkos);
		});
	}
</script>

<table border=0 align=center>
<tr><td colspan=13>Masukkan item cucian:</td></tr>
<tr>
<td>Kategori :</td><td>
    <select name="id_kategori" id="id_kategori" onchange="cek_database1()">
<?php
drop_down_kategori();
?>
</select></td>
<td width="15">&nbsp;</td><td>Ongkos: </td><td><input type=text name="ongkos" id="ongkos" size=10>
<td width="15">&nbsp;</td><td>Pcs: </td><td><input type=text name="jumlah" size="1">
</td>
<td width="15">&nbsp;</td><td>
<input type="hidden" name="id_transaksi" value='<?php echo $id_transaksi; ?>'>
<input type="hidden" name="id_pelanggan" value='<?php echo $id_pelanggan; ?>'>
<input type="hidden" name="alamat" value='<?php echo $alamat; ?>'>
<input type="hidden" name="no_hp" value='<?php echo $no_hp; ?>'>
<input type="submit" value="Simpan">
</td></tr></table>
</form>

<hr width=80% align=center>

<?php
$hasil1 = mysql_query("SELECT * FROM cucian WHERE id_transaksi='$id_transaksi'", $id_mysql);
if(!$hasil1)
die("Menampilkan nota gagal");

echo "<form action='order_masuk_cetak.php' method='GET' name='myform'>";

echo "<p align='center'><b>ORDER MASUK</b></p>";
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

if($n==1)
    $jml = $jumlah_ongkos;
	else
	$jml = $jml + $jumlah_ongkos;
$n++;
}
echo "<tr><td colspan=4 align='center'>J u m l a h</td><td align='right'>";
echo number_format($jml,2,',','.');
echo "</td></tr>";
echo "<tr><td colspan=4 align='center'>Uang muka</td><td align='right'>";
echo "<input type=text name='uang_muka' size=6>";
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