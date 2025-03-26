<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'companyprofile');
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID dari parameter URL
$id_kontak = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID
if ($id_kontak > 0) {
    // Query untuk menghapus kontak berdasarkan ID
    $query = "DELETE FROM kontak WHERE id_kontak = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_kontak);

    if ($stmt->execute()) {
        echo "<script>
                alert('Kontak berhasil dihapus!');
                window.location.href='kontak_kami.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus kontak!');
                window.location.href='kontak_kami.php';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('ID kontak tidak valid!');
            window.location.href='kontak_kami.php';
          </script>";
}

$koneksi->close();
?>
