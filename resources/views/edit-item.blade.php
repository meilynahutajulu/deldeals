<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Items</title>
    <link rel="stylesheet" href="{{ asset('css/add-items.css')}}">
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
            <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
