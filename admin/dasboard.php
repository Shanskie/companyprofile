<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/dasboard.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-3">
            <img src="../img/logo.png" alt="Logo Admin Panel" class="img-fluid" style="max-width: 80px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-home"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <!-- Dropdown Daftar Alat -->
                <a class="nav-link" data-bs-toggle="collapse" href="#alatDropdown" role="button" aria-expanded="false" aria-controls="alatDropdown">
                    <i class="fas fa-box"></i> Daftar Alat <i class="fas fa-caret-down float-end"></i>
                </a>
                <div class="collapse" id="alatDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="daftar_peralatan.php?kategori=Peralatan Tidur">Peralatan Tidur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar_peralatan.php?kategori=Peralatan Makan">Peralatan Makan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar_peralatan.php?kategori=Perlengkapan">Perlengkapan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kontak_kami.php">
                    <i class="fas fa-phone"></i> Kontak
                </a>
            </li>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="return confirmLogout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                    <script>
                        function confirmLogout() {
                        // Konfirmasi logout
                        const isConfirmed = confirm("Apakah Anda yakin ingin keluar?");
                        if (isConfirmed) {
                        // Arahkan ke halaman logout jika pengguna memilih 'OK'
                        window.location.href = "logout_proses.php";
                        }
                        // Tetap di halaman jika pengguna memilih 'Cancel'
                        return false;
                    }
                    </script>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header Card -->
        <div class="header-card mt-4">
            <p>SELAMAT DATANG DI</p>
            <h1>NOYAZI.OUTDOOR</h1>
            <p><a class="btn btn-success">Sewa Alat Camping Terbaik</a></p>
        </div>

        <!-- Cards for Navigation -->
        <div class="container mt-4">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-6">
                    <div class="card"  onclick="location.href='daftar_peralatan.php';">
                        <i class="fas fa-box"></i>
                        <div class="card-body">
                            <h5 class="card-title">Alat</h5>
                            <p class="card-text">Tambah Alat Baru</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6">
                    <div class="card" onclick="location.href='tambah_kontak.php';">
                        <i class="fas fa-user-cog"></i>
                        <div class="card-body">
                            <h5 class="card-title">Kontak</h5>
                            <p class="card-text">Tambah Kontak Baru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
