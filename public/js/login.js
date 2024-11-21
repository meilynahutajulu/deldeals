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

// function login() {
//     var username = document.getElementById('username').value;
//     var password = document.getElementById('password').value;

//     // Kirim data ke server Laravel
//     fetch('/api/login', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'Accept': 'application/json'
//         },
//         body: JSON.stringify({
//             username: username,
//             password: password
//         })
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.redirect_url) {
//             // Jika login berhasil, redirect ke halaman utama
//             window.location.href = data.redirect_url;
//         } else {
//             // Jika login gagal, tampilkan pesan error
//             alert(data.error || 'Login failed!');
//         }
//     })
//     .catch(error => {
//         console.error('Error:', error);
//         alert('Terjadi kesalahan. Silakan coba lagi.');
//     });

//     return false; // Mencegah form di-submit ulang
// }

