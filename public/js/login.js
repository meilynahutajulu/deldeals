function login() {
    // Ambil nilai username dan password dari input
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Validasi input
    if (!username || !password) {
        alert('Username dan password harus diisi!');
        return false; // Mencegah form di-submit
    }

    // Ambil token CSRF dari meta tag
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    // Kirim data ke server Laravel
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Sertakan token CSRF di sini
        },
        body: JSON.stringify({
            username: username,
            password: password
        })
    })
    .then(response => {
        console.log('Server Response:', response); // Log respons server
        if (!response.ok) {
            return response.json().then(err => {
                throw new Error(err.error || 'Login gagal!'); // Ambil pesan error dari respons
            });
        }
        return response.json(); // Parsing JSON dari respons
    })
    .then(data => {
        if (data.redirect_url) {
            // Jika login berhasil, redirect ke halaman utama
            window.location.href = data.redirect_url;
        } else {
            // Jika tidak ada redirect_url, tampilkan pesan error
            alert(data.error || 'Login gagal!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan coba lagi. ' + error.message);
    });

    return false; // Mencegah form di-submit ulang
}

function signup() {
    window.location.href = '/registrasi'; // Redirect ke halaman registrasi
    return false; // Mencegah form di-submit
}

// Menambahkan event listener untuk menangani submit form
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form dari submit default
    login(); // Panggil fungsi login
});