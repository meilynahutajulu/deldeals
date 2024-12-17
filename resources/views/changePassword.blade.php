<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{asset('css/changePassword.css')}}">
    <link rel="stylesheet" href="css/layout/wallpaper.css">
</head>
<body>

    <!-- wallpaper -->
    @include('layout.wallpaper')
    
    <div class="container">
        <div class="box">
            <div class="logo">
                <img src="{{asset('img/forgot_pass.png')}}" alt="DelDeals Logo">
            </div>

            
            <form action="{{ route('validasi-forgot-pass-act')}}" method="POST"> <!-- Fungsi otp dipanggil dari file eksternal -->
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="text-box">
                    <h1>CHANGE YOUR PASSWORD</h1>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="New Password" required>
                </div>
                {{-- <div class="input-box">
                    <input type="password" id="confirm" placeholder="Confirm Password" required>
                </div>
                 --}}
                @error('password')
                    <small>{{ $message }}</small>  
                @enderror

                <p id="result"></p>
                
                <button type="submit" class="change-button">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- Link ke file JavaScript eksternal -->
    <script src="js/changePassword.js"></script>
</body>
</html>
