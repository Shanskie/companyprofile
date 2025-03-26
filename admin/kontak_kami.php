<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Manajemen Kontak</h1>

        <!-- Button Kembali ke Dashboard -->
        <div class="mb-3">
            <a href="dasboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>


        <!-- Button Tambah Kontak -->
        <div class="text-end mb-3">
            <a href="tambah_kontak.php" class="btn btn-success">Tambah Kontak</a>
        </div>

        <?php
        // Koneksi ke database
        $koneksi = new mysqli('localhost', 'root', '', 'companyprofile');
        if ($koneksi->connect_error) {
            die("<p class='text-danger'>Koneksi gagal: " . htmlspecialchars($koneksi->connect_error) . "</p>");
        }

        // Ambil data dari tabel kontak
        $query = "SELECT * FROM kontak";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<thead class='table-light'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>WhatsApp</th>
                    <th>Instagram</th>
                    <th>Aksi</th>
                  </tr>";
            echo "</thead>";
            echo "<tbody>";

            // Loop untuk menampilkan data
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id_kontak']);
                $email = htmlspecialchars($row['email']);
                $whatsapp = htmlspecialchars($row['whatsapp']);
                $instagram = htmlspecialchars($row['instagram']);

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$whatsapp</td>";
                echo "<td>$instagram</td>";
                echo "<td>
                        <a href='edit_kontak.php?id=$id' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='hapus_kontak.php?id=$id' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kontak ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-center'>Belum ada data kontak.</p>";
        }

        $koneksi->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
