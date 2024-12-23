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
            <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateImage()">
                @csrf
                @method('PUT')
                <div class="input-fields">
                    <label for="image">Upload Gambar Baru (Opsional):</label>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    
                    <label for="name">Nama Barang:</label>
                    <input type="text" id="name" name="name" value="{{ $item->name }}" required>
                    
                    <label for="price">Harga Barang:</label>
                    <input type="number" id="price" name="price" value="{{ $item->price }}" required>
                    
                    <label for="description">Deskripsi Barang:</label>
                    <textarea id="description" name="description" required>{{ $item->description }}</textarea>
                </div>
                <div class="button-group">
                    <button type="submit" class="update-button">Update</button>
                    <button type="button" class="cancel-button" onclick="window.location.href='{{ route('tokosaya') }}'">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal error -->
    <div id="error-modal" class="modal">
        <div class="modal-content">
            <p>Format gambar tidak sesuai!!</p>
            <div class="modal-buttons">
                <button class="btn btn-cancel" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui pratinjau gambar
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    preview.src = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        }

        // Validasi file gambar sebelum form dikirim
        function validateImage() {
            const fileInput = document.getElementById('image');
            const filePath = fileInput.value;
            const allowedExtensions = /\.(jpg|jpeg|png|gif|webp)$/i;

            if (filePath && !allowedExtensions.exec(filePath)) {
                document.getElementById('error-modal').style.display = 'flex';
                fileInput.value = ''; // Reset input file
                return false; // Batalkan form submission
            }
            return true; // Lanjutkan form submission jika valid
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('error-modal').style.display = 'none';
        }
    </script>
</body>
</html>
