<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama_alat = $_POST['nama_alat'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    // Cek apakah gambar baru diupload
    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_baru = rand(1, 999) . "_" . $gambar;

        // Pindahkan gambar ke folder 'img'
        move_uploaded_file($file_tmp, "img/" . $gambar_baru);

        // Update dengan gambar baru
        $query = "UPDATE produk SET nama_alat = '$nama_alat', harga = '$harga', gambar = '$gambar_baru', keterangan = '$keterangan' WHERE id = '$id'";
    } else {
        // Jika gambar tidak diubah, update tanpa mengubah gambar
        $query = "UPDATE produk SET nama_alat = '$nama_alat', harga = '$harga', keterangan = '$keterangan' WHERE id = '$id'";
    }

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='daftar_peralatan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!'); window.location='daftar_peralatan.php';</script>";
    }
} else {
    // Jika bukan metode POST
    echo "<script>alert('Metode tidak valid.'); window.location='daftar_peralatan.php';</script>";
}
?>