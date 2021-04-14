<?php
include "header.php";
include "koneksi.php";
?>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="400" align=center>
<form action=order_keluar2.php method=GET>
<input type="hidden" name="id_transaksi" value='<?php echo "$id_transaksi"; ?>'>
 <TBODY>
 <TR><TD colspan=3 height=40 ><p align="center"><b>ORDER KELUAR</b></TD></TR>

 <tr><td>Nama Pelanggan</td><td>:</td><td> <select onchange="cek_database3()" id="id_transaksi" name="id_transaksi">
    <option value='' selected>- Pilih Pelanggan-</option>
	<?php
	    include "koneksi.php";
		$hasil = mysql_query("SELECT * FROM pelanggan, transaksi WHERE pelanggan.id_pelanggan=transaksi.id_pelanggan and transaksi.status='0' ORDER BY nama", $id_mysql);
		while ($baris = mysql_fetch_array($hasil)) {
			echo "<option value='$baris[id_transaksi]'>$baris[nama]-$baris[id_transaksi]</option>";
		}
	?>
	</select></td></tr>
	 <TR>
	 <TD width="200">ID Transaksi/Nota</td><td width="10">:</td>
	 <td><input type="text" id="id_transaksi1" size=3 name="id_transaksi1">
	 </TD></TR>
	    <tr><td>Alamat</td><td>:</td><td><input type="text" id="alamat" size=30 name="alamat"></td></tr>
		
		<tr><td>No HP</td><td>:</td><td><input type="text" id="no_hp" name="no_hp"></td></tr>
		<tr><td>Keterangan</td><td>:</td><td><input type="text" id="keterangan" name="keterangan"></td></tr>
	  <tr><td>Tanggal masuk</td><td>:</td><td><input type="text" name="tanggal_masuk" id="tanggal_masuk"></td></tr>
	  <tr><td>Tanggal selesai</td><td>:</td><td><input type="text" name="tanggal_selesai" id="tanggal_selesai"></td></tr>
	  <tr><td align="center" colspan="3"><input type="submit" value="Lihat Rincian Order"></td></tr></form>
</table>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    function cek_database3(){
	    var id_transaksi = $("#id_transaksi").val();
		$.ajax({
		    url: 'order_keluar_ajax_cek3.php',
			data:"id_transaksi="+id_transaksi ,
			
		}).success(function (data) {
		    var json = data,
			obj = JSON.parse(json);
			$('#id_transaksi1').val(obj.id_transaksi1);
			$('#alamat').val(obj.alamat);
			$('#no_hp').val(obj.no_hp);
			$('#keterangan').val(obj.keterangan);
			$('#tanggal_masuk').val(obj.tanggal_masuk);
			$('#tanggal_selesai').val(obj.tanggal_selesai);
			
		});
	}
</script>

<?php
include "footer.php";
?>