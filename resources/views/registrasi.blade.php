<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <form onsubmit="return login()">
        <div class = "log-in-btn-box">
            <button type="submit" class="log-in-btn">LOGIN</button>
        </div>
    </form>
    
    <div class="background img">
        <img src="{{ asset('img/wa.jpg') }}" alt="background">
    </div>
    <div class="container">
        <h1 class="register-header">Register</h1>
        <p class="register-subheader">Please register to Login</p>
        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" class="input-field" required>
            </div>
            <div class="input-container">
                <input type="text" name="full_name" placeholder="Nama Lengkap" class="input-field" required>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Email" class="input-field" required>
            </div>
            <div class="input-container">
                <input type="text" name="nim" placeholder="NIM" class="input-field" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Password" class="input-field" required>
            </div>
            <div class="register-box">
                <button type="submit" class="register-btn">REGISTER</button>
                {{-- <button type="submit" class="register-btn">REGISTER</button>    --}}
            </div>
            
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
    </div>

    <script src="js/register.js"></script>
    
</body>
</html>