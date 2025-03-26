<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'companyprofile');
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID dari parameter URL
$id_kontak = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID dan ambil data kontak
if ($id_kontak > 0) {
    $query = "SELECT * FROM kontak WHERE id_kontak = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_kontak);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Jika data tidak ditemukan
    if (!$data) {
        echo "<script>
                alert('Kontak tidak ditemukan!');
                window.location.href = 'kontak_kami.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('ID kontak tidak valid!');
            window.location.href = 'kontak_kami.php';
          </script>";
    exit();
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $instagram = $_POST['instagram'];

    // Query untuk update data
    $query_update = "UPDATE kontak SET email = ?, whatsapp = ?, instagram = ? WHERE id_kontak = ?";
    $stmt_update = $koneksi->prepare($query_update);
    $stmt_update->bind_param("sssssi", $email, $whatsapp, $instagram, $id_kontak);

    if ($stmt_update->execute()) {
        echo "<script>
                alert('Data kontak berhasil diperbarui!');
                window.location.href = 'kontak_kami.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data kontak!');
              </script>";
    }

    $stmt_update->close();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Kontak</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo htmlspecialchars($data['whatsapp']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo htmlspecialchars($data['instagram']); ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="kontak_kami.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
