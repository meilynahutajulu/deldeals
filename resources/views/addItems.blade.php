<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Items</title>
    <link rel="stylesheet" href="css/add-items.css">
</head>
<body>
    @include('layout.wallpaper')
    @include('layout.sidebar')
    @include('layout.searchbar')

    <div class="container">

        <form id="uploadForm" onsubmit="return handleSubmit(event)">
            <div class="up-image">
                <img src="{{ asset('img/upload.png') }}" alt="Upload Image">
            </div>
            <div class="input-box">
                <input type="text" id="items-name" placeholder="Nama Barang">
            </div>
            <div class="input-box">
                <input type="text" id="items-price" placeholder="Harga Barang">
            </div>
            <div class="input-box">
                <input type="text" id="items-desc" placeholder="Deskripsi Barang">
            </div>
            <button type="submit">Upload</button>
            <button type="button" onclick="cancel()">Cancel</button>
        </form>      
    </div>
    <script src="js/add-items.js"></script>
</body>
</html>