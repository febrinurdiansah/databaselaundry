<?php
include "header.php";
include "koneksi.php";

$tanggal = date("Y-m-d");
$tanggal_selesai = date('Y-m-d', strtotime('+6 days', strtotime($tanggal)));
//echo "tanggal=$tanggal<br>tanggal_selesai=$tanggal_selesai<br>";

$hasil = mysql_query("INSERT INTO transaksi (tanggal_masuk, tanggal_selesai, id_operator) VALUES ('$tanggal', '$tanggal_selesai', '$id_user')", $id_mysql);
if(!$hasil)
die("Simpan No transaksi gagal");

$hasil1 = mysql_query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1", $id_mysql);
if(!$hasil1)
die("Mencari No transaksi MAX gagal");

 while ( $baris = mysql_fetch_array($hasil1) )
{
$id_transaksi=$baris['id_transaksi'];
}

?>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
<form action=order_masuk2.php method=GET>
<input type="hidden" name="id_transaksi" value='<?php echo "$id_transaksi"; ?>'>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>ORDER MASUK</b></TD></TR>
 <TR>
    <TD width="200">ID Transaksi/Nota</td><td width="10">:</td>
	<td align=left><?php echo "$id_transaksi"; ?>
	</TD></TR>
 <tr><td>Nama pelanggan</td><td>:</td><td> <select onchange="cek_database()" id="id_pelanggan" name="id_pelanggan">
    <option value='' selected>- Pilih pelanggan-</option>
	<?php
	    include "koneksi.php";
		$hasil = mysql_query("SELECT * FROM pelanggan ORDER by nama", $id_mysql);
		while ($baris = mysql_fetch_array($hasil)) {
		    echo "<option value='$baris[id_pelanggan]'>$baris[nama]</option>";
		}
	?>
	</select></td></tr>
	    <tr><td>Alamat</td><td>:</td><td><input type="text" id="alamat" size=30 name="alamat"></td></tr>
		
		<tr><td>No HP</td><td>:</td><td><input type="text" id="no_hp" name="no_hp"></td></tr>
		<tr><td>Keterangan</td><td>:</td><td><input type="text" id="keterangan" name="keterangan"></td></tr>
	  <tr><td>Tanggal masuk</td><td>:</td><td><input type="text" name="tanggal_masuk" value=<?php echo $tanggal; ?>></td></tr>
	  <tr><td>Tanggal selesai</td><td>:</td><td><input type="text" name="tanggal_selesai" value=<?php echo $tanggal_selesai; ?>></td></tr>
	  <tr><td align="center" colspan="3"><input type="submit" value="Masukkan Order"></td></tr></form>
</table>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    function cek_database(){
	    var id_pelanggan = $("#id_pelanggan").val();
		$.ajax({
		    url: 'order_masuk_ajax_cek.php',
			data:"id_pelanggan="+id_pelanggan ,
			
		}).success(function (data) {
		    var json = data,
			obj = JSON.parse(json);
			$('#alamat').val(obj.alamat);
			$('#no_hp').val(obj.no_hp);
			$('#keterangan').val(obj.keterangan);
			
		});
	}
</script>

<?php
include "footer.php";
?>