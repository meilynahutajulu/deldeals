<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Items</title>
    <link rel="stylesheet" href="css/add-items.css">
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
                @csrf
                <div class="input-fields">
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <input type="text" id="item-name" placeholder="Nama Barang">
                    <input type="text" id="item-price" placeholder="Harga Barang">
                    <textarea id="item-description" placeholder="Deskripsi Barang"></textarea>
                </div>
                <div class="button-group">
                    <button type="submit" class="upload-button" onclick="location.href=''">Upload</button>
                    <button type="button" class="cancel-button" onclick="window.location.reload()">Batal</button>
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
    </script>
</body>
</html>
