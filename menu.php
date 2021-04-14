<!doctype html>
<meta name="viewport" content="width=device-width">
<head>
<title>Drop Down Menu</title>
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/bluetabs.css" />
<script type="text/javascript" src="dropdowntabfiles/dropdowntabs.js">
</script>
<body>
<div id="bluemenu" class="bluetabs">
<ul>
<li><a href="selamat.php">Home</a></li>
<?php
if($kode_user=="admin")
echo "<li><a href='#' rel='dropmenu1_b'>Kelola Data Pokok</a></li>";
?>
<li><a href="#" rel="dropmenu2_b">Order Masuk</a></li>
<li><a href="#" rel="dropmenu3_b">Order Keluar</a></li>
<li><a href="#" rel="dropmenu4_b">Laporan</a></li>
<li><a href="logout.php">Logout</a></li>

<?php
echo "<li><a href='#'>";
echo nama_admin($id_user);
echo "</a></li>";
?>

</ul>
</div>

<!--1st drop down menu -->
<div id="dropmenu1_b" class="dropmenudiv_b">
<a href="user.php">User</a>
<a href="kategori.php">Kategori</a>
</div>

<!--2nd drop down menu -->
<div id="dropmenu2_b" class="dropmenudiv_b" style="width: 150px;">
<a href="order_masuk1.php">Order masuk</a>
<a href="order.php">Kelola order</a>
<a href="pelanggan.php">Kelola Pelanggan</a>
</div>

<!--3rt drop down menu -->
<div id="dropmenu3_b" class="dropmenudiv_b" style="width: 150px;">
<a href="order_keluar1.php">Order keluar</a>
<a href="order.php">Kelola order</a>
</div>

<!--4rt drop down menu -->
<div id="dropmenu4_b" class="dropmenudiv_b">
<a href="laporan_pelanggan.php">Lihat Pelanggan</a>
<a href="laporan_order_masuk.php">Daftar Order Masuk</a>
<a href="laporan_order_keluar.php">Daftar Order Keluar</a>
<a href="laporan_pendapatan.php">Pendapatan</a>
<a href="laporan_pendapatan_operator.php">Pendapatan tiap Operator</a>
</div>

<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("bluemenu")
</script>
</body>
</html>