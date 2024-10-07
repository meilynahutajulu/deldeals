<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="background img">
        <img src="img/wa.jpg" alt="background">
    </div>
    <div class="container">
        <h1 class="register-header">Register</h1>
        <p class="register-subheader">Please register to Login</p>
        <form onsubmit="return signin()">
            <div class="input-container">
                <i class="fas fa-user icon"></i>
                <i class=""></i>
                <input type="text" id="username" name="username" placeholder="Username" class="input-field">
            </div>
            <div class="input-container">
                <i class="fas fa-user icon"></i>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="input-field">
            </div>
            <div class="input-container">
                <i class="fas fa-envelope icon"></i>
                <input type="email" id="email" name="email" placeholder="Email" class="input-field">
            </div>
            <div class="input-container">
                <i class="fas fa-id-badge icon"></i>
                <input type="text" id="nim" name="nim" placeholder="NIM" class="input-field">
            </div>
            <div class="input-container">
                <i class="fas fa-lock icon"></i>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
            </div>
            <button id="submit" type="submit">Sign Up</button>
        </form>
    </div>
    <script src="js/register.js"></script>
</body>
</html>