<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["id_user"]);
unset($_SESSION["kode_user"]);
header ("Location: index.php");
?>