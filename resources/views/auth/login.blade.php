<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DelDeals Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- wallpaper -->
    @include('layout.wallpaper')
    <form onsubmit="return signup()">
        <div class = "sign-in-btn-box">
        <button type="button" class="sign-in-btn" onclick="location.href='{{ url('/registrasi') }}';">SIGN UP</button>
        </div>
    </form>
    
    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="img/logo.jpg" alt="DelDeals Logo">
            </div>
            <form onsubmit="return login()"> <!-- Fungsi login dipanggil dari file eksternal -->
                <div class="input-box">
                    <input type="text" id="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <input type="password" id="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="/forgot-pass">*Forgot Password</a>
                </div>
                <button type="submit" class="login-btn">LOG IN</button>
            </form>
        </div>
    </div>

    <!-- Link ke file JavaScript eksternal -->
    <!-- <script src="js/login.js"></script> -->
</body>
</html>

