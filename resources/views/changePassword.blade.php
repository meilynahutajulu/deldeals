<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/changePassword.css">
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

            
            <form onsubmit="return changePass()"> <!-- Fungsi otp dipanggil dari file eksternal -->
                <div class="text-box">
                    <h1>CHANGE YOUR PASSWORD</h1>
                </div>
                <div class="input-box">
                    <input type="password" id="new" placeholder="New Password" required>
                </div>
                <div class="input-box">
                    <input type="password" id="confirm" placeholder="Confirm Password" required>
                </div>
                <p id="result"></p>
                <button type="submit" class="change-button">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- Link ke file JavaScript eksternal -->
    <script src="js/changePassword.js"></script>
</body>
</html>
