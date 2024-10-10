<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <!-- wallpaper -->
    @include('layout.wallpaper')
    <div class="container">
        <div class="login-box">
            <h1>Welcom to DelDeals</h1>
            <div class="logo">
                <img src="img/logo.jpg" alt="DelDeals Logo">
            </div>
            <h1>Temukan, Tawar, Transaksi..</h1>
            <form >
                <button type="submit" class="sign-up-btn">
                <a href="/login" onclick="login()">ENTER</a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>