<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/tokosaya.css') }}">
</head>
<body>
    
    @include('layout.wallpaper')

    <form action=""></form>
    <div class="container">
        @include('layout.sidebar')
        @include('layout.searchbar')
        
        <!-- Main Content -->
        <main class="content">
            <section class="product-list">
                <!-- Product Cards -->
                <div class="product-card">
                    <div class="image-container">
                        <img src="{{ asset('img/Tuperware.jpeg') }}" alt="Tumbler Tupperware">
                    </div>
                    <h3>Tumbler Tupperware</h3>
                    <p>Rp 100.000</p>
                    <button class="add-to-cart">+</button>
                </div>
                
                <div class="product-card">
                    <div class="image-container">
                        <img src="{{ asset('img/keyboard.jpg') }}" alt="Keyboard RGB">
                    </div>
                    <h3>Keyboard RGB</h3>
                    <p>Rp 200.000</p>
                    <button class="add-to-cart">+</button>
                </div>
                <!-- Tambahkan produk lainnya dengan struktur yang sama -->
            </section>
        </main>
        <button type="button" class="add-btn">Add New Item</button>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
