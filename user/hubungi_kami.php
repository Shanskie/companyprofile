<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "companyprofile";

$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query data kontak
$sql = "SELECT * FROM kontak";
$result = $koneksi->query($sql);
$kontak = $result->fetch_assoc(); // Ambil data pertama
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hubungi Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-green-700 text-black">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <img src="../img/logo.png" alt="Company Logo" class="h-12" width="60px"/>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="homepage.php" class="hover:text-gray-300">Home</a></li>
                    <li><a href="kategori.php" class="hover:text-gray-300">Layanan/Daftar Alat</a></li>
                    <li><a href="tentang_kami.php" class="hover:text-gray-300">Tentang Kami</a></li>
                    <li class="underline"><a href="hubungi_kami.php" class="hover:text-gray-300">Hubungi Kami</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
        <img src="../img/alam4.jpg" alt="Sunset over a mountain" class="w-full h-64 object-cover"/>
    </section>
    <section class="text-center py-12 bg-white">
        <p class="text-gray-600">Ada Pertanyaan?</p>
        <h2 class="text-2xl font-bold mb-4">Kami di sini untuk membantu.</h2>
        <hr class="border-t-2 border-green-700 w-16 mx-auto mb-8"/>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- WhatsApp -->
            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                <a href="https://api.whatsapp.com/send/?phone=%2B6285754082639&text&type=phone_number&app_absent=0"<?php echo $kontak['whatsapp']; ?>>
                    <i class="fab fa-whatsapp text-4xl text-green-700 mb-4"></i>
                    <h3 class="text-xl font-semibold">WhatsApp</h3>
                    <p><?php echo $kontak['whatsapp']; ?></p>
                </a>
            </div>
            <!-- Instagram -->
            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                <a href="https://www.instagram.com/<?php echo $kontak['instagram']; ?>">
                    <i class="fab fa-instagram text-4xl text-green-700 mb-4"></i>
                    <h3 class="text-xl font-semibold">Instagram</h3>
                    <p>@<?php echo $kontak['instagram']; ?></p>
                </a>
            </div>
            <!-- Email -->
            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                <a href="mailto:noyazioutdoor@gmail.com"<?php echo $kontak['email']; ?>>
                    <i class="fas fa-envelope text-4xl text-green-700 mb-4"></i>
                    <h3 class="text-xl font-semibold">E-mail</h3>
                    <p><?php echo $kontak['email']; ?></p>
                </a>
            </div>
        </div>
    </section>
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
                <a href="https://api.whatsapp.com/send/?phone=%2B6285754082639&text&type=phone_number&app_absent=0"><p><i class="fab fa-whatsapp"></i> WhatsApp</p> </a>
                <a href="https://www.instagram.com/noyazi.outdoor"><p><i class="fab fa-instagram"></i> Instagram</p> </a>
                <a href="mailto:noyazioutdoor@gmail.com"><p><i class="fas fa-envelope"></a></i> Email</p> </a>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
// Tutup koneksi
$koneksi->close();
?>
