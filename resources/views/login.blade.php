<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- wallpaper -->
    @include('layout.wallpaper')

    <!-- Tombol SIGN UP -->
    <form>
        <div class="sign-in-btn-box">
            <button type="button" class="sign-in-btn" onclick="location.href='{{ url('/registrasi') }}';">SIGN UP</button>
        </div>
    </form>
    
    <!-- Container Utama -->
    <div class="container">
        <div class="login-box">
            <!-- Logo -->
            <div class="logo">
                <img src="img/logo.jpg" alt="DelDeals Logo">
            </div>

            <!-- Form Login -->
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <!-- Tampilkan Pesan Error -->
                @if($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Input Username -->
                <div class="input-box">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>

                <!-- Input Password -->
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>

                <!-- Lupa Password -->
                <div class="forgot-password">
                    <a href="/forgot-pass">*Forgot Password</a>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="login-btn">LOG IN</button>
            </form>
        </div>
    </div>

</body>
</html>

