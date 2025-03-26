<?php
include("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus data berdasarkan ID
    $query = "DELETE FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='daftar_peralatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='daftar_peralatan.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='daftar_peralatan.php';</script>";
}
?>