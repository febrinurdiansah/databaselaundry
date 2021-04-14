<!DOCTYPE html>
<meta name="viewport" content="width=device-width">
<head>
	<title>Drop Down Menu</title>
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/bluetabs.css" />
<script type="text/javascript" src="dropdowntabfiles/dropdowntabs.js">
</script>
<body>
<div id="bluemenu" class="bluetabs">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="#" rel="dropmenu1_b">Kelola Data Pokok</a></li>
<li><a href="#" rel="dropmenu2_b">Order Masuk</a></li>
<li><a href="#" rel="dropmenu3_b">Order Keluar</a></li>
<li><a href="#" rel="dropmenu4_b">Laporan</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

<!--1st drop down menu -->
<div id="dropmenu1_b" class="dropmenudiv_b">
<a href="user.php">User</a>
<a href="kategori.php">Kategori</a>
</div>

<!--2nd drop down menu -->
<div id="dropmenu2_b" class="dropmenudiv_b" style="width: 150px;">
<a href="order_masuk.php">Order masuk</a>
<a href="order">Kelola order</a>
</div>

<!--3rt drop down menu -->
<div id="dropmenu3_b" class="dropmenudiv_b" style="width: 150px;">
<a href="order_keluar.php">Order keluar</a>
<a href="order">Kelola order</a>
</div>

<!--4rt drop down menu -->
<div id="dropmenu4_b" class="dropmenudiv_b">
<a href="user.php">Daftar Order</a>
<a href="pendapatan.php">Pendapatan tiap hari</a>
</div>

<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("bluemenu")
</script>
</body>
</html>