<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Items</title>
    <link rel="stylesheet" href="{{ asset('css/add-items.css') }}">
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
        .modal-buttons {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 135px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    @include('layout.wallpaper')
    @include('layout.sidebar')
    @include('layout.searchbar')

    <div class="container">
        <div class="form">
            <!-- Box untuk gambar pratinjau -->
            <div class="image-box">
                <img id="preview-image" src="" alt="Your Items">
            </div>

            <!-- Form untuk input -->
            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateImage()">
                @csrf
                <div class="input-fields">
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" required>
                    <input type="text" id="item-name" name="name" placeholder="Nama Barang" required>
                    <input type="text" id="item-price" name="price" placeholder="Harga Barang" required>
                    <textarea id="item-description" name="description" placeholder="Deskripsi Barang" required></textarea>
                </div>
                <div class="button-group">
                    <button type="submit" class="upload-button">Upload</button>
                    <button type="button" class="cancel-button" onclick="window.location.reload()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal error -->
    <div id="error-modal" class="modal">
        <div class="modal-content">
            <p>Hanya file gambar (JPG, JPEG, PNG, GIF) yang diperbolehkan.</p>
            <div class="modal-buttons">
                <button class="btn btn-cancel" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui pratinjau gambar
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Validasi file gambar sebelum form dikirim
        function validateImage() {
            const fileInput = document.getElementById('image');
            const filePath = fileInput.value;
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            // Cek apakah file yang dipilih adalah gambar
            if (!allowedExtensions.exec(filePath)) {
                // Tampilkan modal error
                document.getElementById('error-modal').style.display = 'flex';
                fileInput.value = ''; // Menghapus input file
                return false; // Membatalkan form submission
            }
            return true; // Melanjutkan form submission
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('error-modal').style.display = 'none';
        }
    </script>
</body>
</html>
