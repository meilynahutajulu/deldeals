<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<!-- wallpaper -->
@include('layout.wallpaper')
    <div class="container">
        <!-- Sidebar with Logo -->
        @include('layout.sidebar')

        <!-- Main content area -->
        <main class="content">
            <!-- Search bar -->
        @include('layout.searchbar')
        
        <!-- Product grid -->
        <div class="product-grid">
                <div class="product">
                    <img src="Tuperware.jpeg" alt="Tumbler Tupperware">
                    <h2>Tumbler Tupperware</h2>
                    <p>Rp 100.000</p>
                    <button class="add-to-cart">@include('layout.button_add')</button>
                          
                </div>
                <div class="product">
                    <img src="FlashDisk.jpeg" alt="FlashDisk">
                    <h2>FlashDisk</h2>
                    <p>Rp 50.000</p>
                    <button class="add-to-cart">@include('layout.button_add')</button>
                </div>
                <div class="product">
                    <img src="image/laptop.jpg" alt="laptop">
                    <h2>laptop</h2>
                    <p>Rp 20.000.000</p>
                    <button class="add-to-cart">@include('layout.button_add')</button>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
