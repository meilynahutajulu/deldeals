<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot.css">
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

            
            <form action="{{route('forgot-password-act')}}" method="POST"> <!-- Fungsi otp dipanggil dari file eksternal -->
                @csrf
                
                <div class="text-box">
                    <h1>Forgot Password</h1>
                    <p>Enter your register email address</p>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <p id = "result"></p>
                <button type="submit" class="send-otp-btn">SUBMIT</button>
                
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
