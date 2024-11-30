function handleSubmit(event) {
    event.preventDefault(); // Mencegah reload halaman
    const name = document.getElementById("items-name").value;
    const price = document.getElementById("items-price").value;
    const description = document.getElementById("items-desc").value;
    const file = document.getElementById("file") ? document.getElementById("file").files[0] : null;

    if (!name || !price || !description) {
        alert("Semua field harus diisi!");
        return false;
    }

    const formData = new FormData();
    formData.append("name", name);
    formData.append("price", price);
    formData.append("description", description);
    if (file) {
        formData.append("file", file);
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/add-items", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert("Barang berhasil diunggah!");
            window.location.href = "/dashboard"; // Ubah ke halaman dashboard atau lainnya
        } else {
            alert("Gagal mengunggah barang.");
        }
    };
    xhr.send(formData);
}

function cancel() {
    window.location.href = "/dashboard"; // Ubah ke halaman tujuan setelah pembatalan
}
