<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "companyprofile";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil kategori dari URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Query untuk mendapatkan daftar produk berdasarkan kategori
$query = "SELECT * FROM produk WHERE kategori = '" . mysqli_real_escape_string($koneksi, $kategori) . "'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kategori</title>
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

    <main class="container mx-auto py-8">
    <button onclick="window.location.href='kategori.php'" class="bg-gray-700 text-white px-4 py-2 rounded"><< Kembali</button>
    <h1 class="text-2xl font-bold text-gray-800">Daftar Produk <?php echo ucfirst($kategori);?></h1>
    <div class="border-t-2 border-gray-300 w-16 mb-6"></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="bg-white p-4 border border-gray-300 rounded-lg shadow">
                    <img src="../img/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama_alat']); ?>" class="w-full h-40 object-cover mb-4">
                    <h2 class="text-lg font-bold mb-2"><?php echo htmlspecialchars($row['nama_alat']); ?></h2>
                    <p class="text-gray-700">Harga: Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                    <p class="text-sm text-gray-600 mb-4"><?php echo htmlspecialchars($row['keterangan']); ?></p>
                    <a href="detail_produk.php?id=<?php echo $row['id']; ?>" class="text-white bg-green-700 px-4 py-2 rounded hover:bg-green-800">Detail</a>
                </div>
            <?php } ?>
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

<?php
// Tutup koneksi
mysqli_close($koneksi);
?>
