<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "companyprofile");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Ambil data kategori unik dari tabel produk
$query = "SELECT DISTINCT kategori FROM produk";
$result = $koneksi->query($query);
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

    <!-- Main Content -->
    <main class="flex-grow">
        <img alt="Scenic view of a mountain" class="w-full h-64 object-cover" src="../img/bg1.jpg" />
        <div class="text-center my-8">
            <h2 class="text-2xl font-bold">Kategori</h2>
            <hr class="w-16 mx-auto border-black mt-2" />
        </div>

        <div class="flex justify-center flex-wrap space-x-4">
            <?php
            // Periksa apakah ada data kategori
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $kategori = $row['kategori'];
                    echo "<a href='daftar_produk.php?kategori=" . urlencode($kategori) . "'>
                            <div class='bg-green-300 p-8 rounded-lg shadow-md text-center w-48 mb-4'>
                                <p>" . htmlspecialchars($kategori) . "</p>
                            </div>
                          </a>";
                }
            } else {
                echo "<p class='text-center'>Tidak ada kategori ditemukan.</p>";
            }
            ?>
        </div>
    </main>
    <br>

    <br/>


    <br>


    <br/>


    <br>


    <br/>
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
// Tutup koneksi database
$koneksi->close();
?>
