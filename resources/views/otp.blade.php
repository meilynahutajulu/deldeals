<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/otp.css">
    <link rel="stylesheet" href="css/layout/wallpaper.css">
</head>
<body>

    <!-- wallpaper -->
    @include('layout.wallpaper')
    
    <div class="container">
        <div class="box">
            <div class="logo">
                <img src="img/forgot_pass.png" alt="DelDeals Logo">
            </div>

            
            <form onsubmit="return verifyOTP()"> <!-- Fungsi otp dipanggil dari file eksternal -->
                <div class="text-box">
                    <h1>Check your email address </h1>
                    {{-- <p>Check your email address</p> --}}
                </div>
                <button type="submit" class="verify-button">VERIFY</button>
            </form>
        </div>
    </div>

    <!-- Link ke file JavaScript eksternal -->
</body>
</html>
