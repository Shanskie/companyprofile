<?php 
include("koneksi.php");

// Memastikan ID ada di dalam URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Memastikan $id adalah integer untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($koneksi, $id);

    // Query untuk mengambil data berdasarkan ID
    $query = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    // Mengambil data jika ditemukan
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan pada tabel.'); window.location='daftar_peralatan_tidur.php';</script>";
        exit();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alat</title>
    <style type="text/css">     
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
        }
        .base {
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border: 0;
            margin-top: 20px;
        }
        img {
            width: 120px;
            margin-bottom: 5px;
        }
        i {
            font-size: 11px;
            color: red;
        }
    </style>
</head>
<body>
    <center><h1>Edit Alat</h1></center>
    <form method="POST" action="edit_proses_peralatan.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>ID</label>
                <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>" />
                <input type="text" value="<?= htmlspecialchars($data['id']); ?>" disabled />
            </div>
            <div>
                <label>Nama Alat</label>
                <input type="text" name="nama_alat" value="<?= htmlspecialchars($data['nama_alat']); ?>" required />
            </div>
            <div>
                <label>Harga</label>
                <input type="text" name="harga" value="<?= htmlspecialchars($data['harga']); ?>" required />
            </div>
            <div>
                <label>Gambar</label>
                <img src="'img'/<?= htmlspecialchars($data['gambar']); ?>" alt="Gambar Alat" />
                <input type="file" name="gambar" />
                <i>* Tidak wajib diganti</i>
            </div>
            <div>
                <label>Keterangan</label>
                <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']); ?>" required />
            </div>
            <div>
                <button type="submit">Simpan</button>
            </div>
        </section>
    </form>
</body>
</html>