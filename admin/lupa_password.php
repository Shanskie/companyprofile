<?php
// Mulai sesi
session_start();

// Jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    // Validasi input email
    if (empty($email)) {
        echo "<script>alert('Email harus diisi!'); window.location.href = 'lupa_password.php';</script>";
        exit;
    }

    // Dummy data pengguna
    $dummy_users = [
        ["email" => "noyazioutdoor@gmail.com"]
    ];

    // Cek apakah email terdaftar
    $user_found = false;
    foreach ($dummy_users as $user) {
        if ($user['email'] === $email) {
            $user_found = true;
            break;
        }
    }

    if ($user_found) {
        echo "<script>alert('Instruksi reset password telah dikirim ke email Anda.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location.href = 'lupa_password.php';</script>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e8f5e9;
            font-family: Arial, sans-serif;
        }
        .forgot-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px #0F3D0F(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .forgot-container h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #0F3D0F;
        }
        .forgot-container input {
            width: 100%;
            padding: 10px 0%;
            border: 1px solid #0F3D0F;
            border-radius: 4px;
            font-size: 1em;
            margin-bottom: 20px;
        }
        .forgot-container .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }
        .btn-submit {
            background-color: #388e3c;
            color: white;
            margin-bottom: 10px;
        }
        .btn-submit:hover {
            background-color: #2e7d32;
        }
        .btn-back {
            background-color: #c8e6c9;
            color: #333333;
        }
        .btn-back:hover {
            background-color: #a5d6a7;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <form action="lupa_password.php" method="POST">
            <h2>Lupa Password</h2>
            <input type="email" name="email" placeholder="Masukkan email Anda" required>
            <button type="submit" class="btn btn-submit">Kirim</button>
            <button type="button" class="btn btn-back" onclick="history.back();">Kembali</button>
        </form>
    </div>
</body>
</html>
