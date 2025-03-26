<?php
// Koneksi ke database
include '../admin/koneksi.php';

// Mendapatkan ID produk dari URL
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan detail produk
$query = "SELECT * FROM produk WHERE id = $id_produk";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $produk = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='daftar_produk.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Detail Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-green-700 text-black">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <img alt="Company Logo" class="h-12" height="50" src="../img/logo.png" width="60px" />
            <nav>
                <ul class="flex space-x-6">
                    <li><a class="hover:text-gray-300" href="homepage.php">Home</a></li>
                    <li class="underline"><a class="hover:text-gray-300" href="kategori.php">Layanan/Daftar Alat</a></li>
                    <li><a class="hover:text-gray-300" href="tentang_kami.php">Tentang Kami</a></li>
                    <li><a class="hover:text-gray-300" href="hubungi_kami.php">Hubungi Kami</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-8 px-6">
    <button onclick="history.back()" class="bg-gray-700 text-white px-4 py-2 rounded mb-4"><< Kembali</button>
        <div class="bg-white p-6 border border-gray-300 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <img src="../img/<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama_alat']; ?>" class="w-64 h-64 object-cover mb-4 md:mb-0 md:mr-6">
                <div>
                    <h2 class="text-2xl font-bold mb-4"><?php echo $produk['nama_alat']; ?></h2>
                    <p class="text-green-700 mb-4">Harga: Rp<?php echo number_format($produk['harga'], 2, ',', '.'); ?></p>
                    <p class="text-1xl font-bold mb-4">Keterangan:</p>
                    <p class="text-green-700"><?php echo nl2br($produk['keterangan']); ?></p>
                </div>
            </div>
           <center> <div class="mt-4" >
                        <a href="https://api.whatsapp.com/send/?phone=%2B6285754082639&text&type=phone_number&app_absent=0">
                    <button class="bg-green-500 text-white px-4 py-2 rounded-full flex items-center">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </button>
                        </a>
                    </div>
           </center>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-700 text-white p-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <h3 class="font-bold text-black">HEADQUARTERS</h3>
                <p>Alamat: Gg. Sukaria,</p>
                <p>Kelayan Tengah,</p>
                <p>Kec. Banjarmasin Sel.,</p>
                <p>Kota Banjarmasin,</p>
                <p>Kalimantan Selatan 70242</p>
                <div class="flex space-x-2 mt-2">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.tiktok.com/@noyazi.outdoor"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-black">TINDAKAN CEPAT</h3>
                <p><a class="hover:underline" href="kategori.php">Layanan/Daftar Alat</a></p>
                <p><a class="hover:underline" href="tentang_kami.php">Tentang Kami</a></p>
            </div>
            <div>
                <h3 class="font-bold text-black">HUBUNGI KAMI</h3>
                <a href="https://api.whatsapp.com/send/?phone=%2B6285754082639&text&type=phone_number&app_absent=0">
                    <p><i class="fab fa-whatsapp"></i> WhatsApp</p>
                </a>
                <a href="https://www.instagram.com/noyazi.outdoor">
                    <p><i class="fab fa-instagram"></i> Instagram</p>
                </a>
                <a href="mailto:noyazioutdoor@gmail.com">
                    <p><i class="fas fa-envelope"></i> Email</p>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
