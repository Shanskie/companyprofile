<?php
// Memulai sesi
session_start();

// Menghapus semua variabel sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Mengarahkan kembali ke halaman login atau halaman utama
header("Location:../user/splashscreen.php");
exit();

?>
