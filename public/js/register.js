const form = document.getElementById('form');
const hasil = document.getElementById('hasil');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const pesan = document.getElementById('pesan').value;

    hasil.innerHTML = `Nama: ${nama}<br>Email: ${email}<br>Pesan: ${pesan}`;
});

function signin(){
    var username = document.getElementById('username').value;
    var nama = document.getElementById('nama').value;
    var email = document.getElementById('email').value;
    var nim = document.getElementById('nim').value;
    var password = document.getElementById('password').value;

    if (username === '' || nama ==='' || email === '' || nim === '' || password === '' ) {
        alert('Lakukan login terlebih dahulu!!')
        return false; // Mencegah form di-submit ulang
    } else {
        alert('Regitrasi Berhasil!!');
        window.location.href = '/login';
        return false; // Mencegah form di-submit
    }
}