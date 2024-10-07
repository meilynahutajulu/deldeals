const form = document.getElementById('form');
const hasil = document.getElementById('hasil');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const pesan = document.getElementById('pesan').value;

    hasil.innerHTML = `Nama: ${nama}<br>Email: ${email}<br>Pesan: ${pesan}`;
<<<<<<< Updated upstream
});
=======
});

function signin(){
    window.location.href = '/';
    return false;
}
>>>>>>> Stashed changes
