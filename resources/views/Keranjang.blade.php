<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS - Keranjang</title>
    <link rel="stylesheet" href="css/keranjang.css">
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

            <!-- Cart items list -->
            <div class="cart-items">
                <div class="cart-item">
                    <img src="img/Tuperware.jpeg" alt="Tumbler Tupperware">
                    <div class="cart-item-details">
                        <h2>Tumbler Tupperware</h2>
                        <p>Rp 100.000</p>
                    </div>
                    <button class="remove-item">Hapus</button>
                </div>

                <div class="cart-item">
                    <img src="img/Headset.jpeg" alt="Headset Gaming">
                    <div class="cart-item-details">
                        <h2>Headset Gaming</h2>
                        <p>Rp 230.000</p>
                    </div>
                    <button class="remove-item">Hapus</button>
                </div>

                <!-- Tambahkan item keranjang lainnya di sini -->

                <div class="cart-total">
                    <p>Total item: 2</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
