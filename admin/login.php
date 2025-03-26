<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px #0F3D0F(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #0F3D0F;
        }
        .login-container .input-group {
            position: relative;
            margin: 10px 0%;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px 0%;
            border: 1px solid #0F3D0F;
            border-radius: 4px;
            font-size: 1em;
        }
        .login-container .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }
        .login-container .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }
        .btn-login {
            background-color: #388e3c;
            color: white;
            margin-bottom: 10px;
        }
        .btn-login:hover {
            background-color: #2e7d32;
        }
        .btn-back {
            background-color: #c8e6c9;
            color: #333333;
        }
        .btn-back:hover {
            background-color: #a5d6a7;
        }
        .forgot-password {
            display: block;
            margin: 10px 0;
            font-size: 0.9em;
            color: #388e3c;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login_proses.php" method="POST">
            <h2>Login</h2>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">👁️ </span>
            </div>
            <a href="lupa_password.php" class="forgot-password">Lupa Password</a>
            <button type="submit" class="btn btn-login">Login</button>
            <button type="button" class="btn btn-back" onclick="location.href='../user/splashscreen.php';">Kembali</button>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
