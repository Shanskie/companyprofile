<?php
    include("koneksi.php");

    // Ambil data dari form
$nama_alat = $_POST['nama_alat'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];
$kategori = $_POST['kategori'];

// Proses unggah gambar
$target_dir = "../img";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$upload_ok = 1;
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Periksa apakah file adalah gambar
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
if ($check !== false) {
    $upload_ok = 1;
} else {
    echo "File bukan gambar.";
    $upload_ok = 0;
}

// Periksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $upload_ok = 0;
}

// Periksa ukuran file (maksimal 2MB)
if ($_FILES["gambar"]["size"] > 2000000) {
    echo "Maaf, ukuran file terlalu besar.";
    $upload_ok = 0;
}

// Izinkan hanya format gambar tertentu
if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
    echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
    $upload_ok = 0;
}

// Cek apakah ada kesalahan pada proses unggah
if ($upload_ok == 0) {
    echo "Maaf, file tidak dapat diunggah.";
} else {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // Jika unggah berhasil, simpan data ke database
        $stmt = $koneksi->prepare("INSERT INTO produk (nama_alat, harga, keterangan, gambar, kategori) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $nama_alat, $harga, $keterangan, $target_file, $kategori);
        if ($stmt->execute()) {
            echo "Alat berhasil ditambahkan.";
            echo "<br><a href='daftar_peralatan.php?kategori=$kategori'>Kembali ke Daftar Alat</a>";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}

$koneksi->close();
?>

