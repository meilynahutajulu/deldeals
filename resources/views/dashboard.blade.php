<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    
</head>
<body>
    <!-- wallpaper -->
    @include('layout.wallpaper')
    <div class="container">
        <form action="{{ route ('login')}}" method="get">
            <div class="login-box">
                <h1>Welcome to</h1>
                <div class="logo">
                    <img src="img/logo.jpg" alt="DelDeals Logo">
                </div>
                <h1>Temukan, Tawar, Transaksi..</h1>
                <form >
                    <button type="submit" class="sign-up-btn">
                        ENTER
                    </button>
                </form>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('.sign-up-btn').addEventListener('click', function() {
            console.log('Tombol ENTER ditekan');
        });
    </script>    
</body>
</html>