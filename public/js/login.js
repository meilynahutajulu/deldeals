function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Simulasi login
    if (username === 'admin' && password === 'password') {
        window.location.href = '/utama'; // Pindah ke halaman home
        return false; // Mencegah form di-submit ulang
    } else {
        alert('Username atau password salah!');
        return false; // Mencegah form di-submit
    }
}

function signup(){
    window.location.href = '/registrasi';
    return false;
}

function sendOtp(){
    var gmail = document.getElementById('email').value;

    // Simulasi login
    if (gmail === 'bernadyaaa@gmail.com') {
        window.location.href = '/otp'; // Pindah ke halaman home
        return false; // Mencegah form di-submit ulang
    } else {
        alert('Email anda tidak terdaftar');
        return false; // Mencegah form di-submit
    }
}
