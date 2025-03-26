<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Home Page
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
  <header class="bg-green-700 text-black">
   <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <img alt="Company Logo" class="h-12" height="50" src="../img/logo.png" width="60px"/>
    <nav>
     <ul class="flex space-x-6">
      <li class="underline">
       <a class="hover:text-gray-300" href="homepage.php">
        Home
       </a>
      </li>
      <li>
       <a class="hover:text-gray-300" href="kategori.php">
        Layanan/Daftar Alat
       </a>
      </li>
      <li>
       <a class="hover:text-gray-300" href="tentang_kami.php">
        Tentang Kami
       </a>
      </li>
      <li>
       <a class="hover:text-gray-300" href="hubungi_kami.php">
        Hubungi Kami
       </a>
      </li>
      <li>
      <a class="hover:text-gray-300 text-1xl font-bold mb-4" href="../admin/index.php">
       LOGIN
       ADMIN
      </a>
    </li>
     </ul>
    </nav>
   </div>
  </header>
  <main>
   <div class="relative">
    <img alt="Scenic background image of mountains and clouds" class="w-full h-64 object-cover" height="400" src="../img/alam1.jpg" width="1200"/>
   </div>
   <div class="container mx-auto py-8 px-6">
    <h1 class="text-2xl font-bold mb-4">
     Rekomendasi Produk Terlaris :
    </h1>
    <div class="border-t-2 border-black w-16 mb-6">
    </div>
    <div class="bg-white p-6 border border-gray-300 mb-6">
    <a href="detail_produk.php?id=1">
     <div class="flex flex-col md:flex-row items-center">
      <img alt="Blue camping tent" class="w-48 h-48 object-cover mb-4 md:mb-0 md:mr-6" height="200" src="../img/tenda.jpg" width="200"/>
      <div>
       <h2 class="text-xl font-bold mb-2">
        Tenda Camping Eliot :
       </h2>
       <ul class="list-disc list-inside">
        <li>
         Size : 200 x 200 x 125 cm
        </li>
        <li>
         Outer Fabrics : Waterproof Coating 190T PU 800mm
        </li>
        <li>
         Inner Fabrics : 170T Breathable Polyester
        </li>
        <li>
         Poles : 7.9mm Fiber glass
        </li>
        <li>
         Floor : PE 110G/M2
        </li>
        <li>
         Gross Weight : 5 Kg
        </li>
        <li>
         Carry Bag : 50 x 20 x 20 cm
        </li>
        <li>
         Kapasitas 4 orang
        </li>
       </ul>
      </div>
     </div>
    </a>
    </div>
    <div class="bg-white p-6 border border-gray-300">
    <a href="detail_produk.php?id=2">
     <div class="flex flex-col md:flex-row items-center">
      <img alt="Black rolled-up mat" class="w-48 h-48 object-cover mb-4 md:mb-0 md:mr-6" height="200" src="../img/matras.jpg" width="200"/>
      <div>
       <h2 class="text-xl font-bold mb-2">
        Matras
       </h2>
       <ul class="list-disc list-inside">
        <li>
         Bahan Spons
        </li>
        <li>
         Ketebalan 3 mm
        </li>
        <li>
         Ukuran : (PxL) 60 x 180 cm
        </li>
        <li>
         Berat : 700 gram
        </li>
       </ul>
      </div>
     </div>
    </a>
    </div>
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
                <a href="https://api.whatsapp.com/send/?phone=%2B6285754082639&text&type=phone_number&app_absent=0"><p><i class="fab fa-whatsapp"></i> WhatsApp</p> </a>
                <a href="https://www.instagram.com/noyazi.outdoor"><p><i class="fab fa-instagram"></i> Instagram</p> </a>
                <a href="https://noyazioutdoor@gmail.com"><p><i class="fas fa-envelope"></a></i> Email</p> </a>
            </div>
        </div>
    </footer>
 </body>
</html>
