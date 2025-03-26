<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat Berdasarkan Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        .button-container {
            text-align: right;
            margin: 20px 0;
        }
        .button {
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            background-color: #4caf50;
            font-size: 16px;
        }
        .button-back {
            text-align: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
        img {
            width: 100px;
            height: auto;
        }
        .btn-edit {
            background-color: #007bff;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }
        .btn-hapus {
            background-color: #dc3545;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }
        @media (max-width: 600px) {
            .container {
                width: 100%;
                margin: 10px;
            }
            img {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Koneksi ke database
        $koneksi = new mysqli('localhost', 'root', '', 'companyprofile');
        if ($koneksi->connect_error) {
            die("<p style='color: red;'>Koneksi gagal: " . htmlspecialchars($koneksi->connect_error) . "</p>");
        }

        // Ambil kategori dari URL
        $kategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : '';

        echo "<h1>Daftar Alat - " . htmlspecialchars($kategori) . "</h1>";
        ?>

        <!-- Button Kembali ke Dashboard -->
        <div class="button-back">
            <a href="dasboard.php" class="button">Kembali ke Dashboard</a>
        </div>

        <!-- Button Tambah Alat -->
        <div class="button-container">
            <a href="tambah_peralatan.php?kategori=<?php echo urlencode($kategori); ?>" class="button">Tambah Alat +</a>
        </div>

        <?php
        // Query untuk mengambil data berdasarkan kategori
        $stmt = $koneksi->prepare("SELECT id, nama_alat, harga, keterangan, gambar FROM produk WHERE kategori = ?");
        $stmt->bind_param("s", $kategori);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Gambar</th><th>Nama Alat</th><th>Harga</th><th>Keterangan</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $gambar = htmlspecialchars($row['gambar']);
                $nama = htmlspecialchars($row['nama_alat']);
                $harga = number_format($row['harga'], 2, ',', '.');
                $keterangan = htmlspecialchars($row['keterangan']);

                echo "<tr>";
                echo "<td><img src='../img/$gambar' alt='Gambar $nama'></td>";
                echo "<td>$nama</td>";
                echo "<td>Rp $harga</td>";
                echo "<td>$keterangan</td>";
                echo "<td>
                        <a href='edit_peralatan.php?id=$id' class='btn-edit'>Edit</a> <hr>
                        <a href='hapus_proses_peralatan.php?id=$id' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' class='btn-hapus'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada alat dalam kategori ini.</p>";
        }

        $stmt->close();
        $koneksi->close();
        ?>
    </div>
</body>
</html>
