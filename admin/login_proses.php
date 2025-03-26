<?php
    include("koneksi.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Using prepared statements to prevent SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo '<script language="javascript">
        alert("Email atau Password salah! Silahkan Login Kembali"); 
        document.location="login.php";
        </script>';
    } else {
        echo '<script language="javascript">
        alert("Login Berhasil!"); 
        document.location="dasboard.php";
        </script>';
    }

    $stmt->close();
    $koneksi->close();
?>
