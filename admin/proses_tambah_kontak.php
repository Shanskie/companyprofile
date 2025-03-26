<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'companyprofile');
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];
$instagram = $_POST['instagram'];

// Query untuk menambahkan data
$query = "INSERT INTO kontak (email, whatsapp, instagram) VALUES (?, ?, ?, ?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("sssss", $nama, $alamat, $email, $whatsapp, $instagram);

if ($stmt->execute()) {
    echo "<script>alert('Kontak berhasil ditambahkan!'); window.location.href='kontak_kami.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan kontak!'); window.location.href='tambah_kontak.php';</script>";
}

$stmt->close();
$koneksi->close();
?>
