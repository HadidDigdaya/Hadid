<?php
session_start(); // memulai atau melanjutkan sesi dalam php 
session_unset(); // Menghapus semua data dalam  sesi
session_destroy(); // Menghancurkan sesi
header("Location: login.php"); // mengarahkan ke alamat
exit;
?>
