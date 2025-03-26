<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="file"] {
            border: none;
        }
        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        button.back-button {
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Alat Baru</h1>
        <form action="proses_tambah_peralatan.php" method="POST" enctype="multipart/form-data">
            <label for="nama_alat">Nama Alat</label>
            <input type="text" id="nama_alat" name="nama_alat" required>

            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" step="0.01" required>

            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4" required></textarea>

            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="Peralatan Tidur">Peralatan Tidur</option>
                <option value="Peralatan Makan">Peralatan Makan</option>
                <option value="Perlengkapan">Perlengkapan</option>
            </select>

            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <button type="submit">Tambah Alat</button>
            <button type="button" class="back-button" onclick="history.back()">Kembali</button>
        </form>
    </div>
</body>
</html>