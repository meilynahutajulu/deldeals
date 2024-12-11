<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="css/tokosaya.css">
</head>
<body>
<!-- wallpaper -->
@include('layout.wallpaper')
<div class="container">
        @include('layout.searchbar')
        <!-- Sidebar with Logo -->
        @include('layout.sidebar')
        

        <!-- Main content area -->
        <main class="content">
            <!-- Search bar -->

            <div class="product-grid">
                @if($item->isEmpty())
                    <p>Tidak ada produk yang tersedia.</p>
                @else
                    @foreach ($item as $items)
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $items->image) }}" alt="{{ $items->name }}">
                        </div>
                        <h3>{{ $items->name }}</h3>
                        <p>Rp {{ number_format($items->price, 2, ',', '.') }}</p>
                        <button class="add-to-cart">+</button>
                    @endforeach
                @endif
            </div>
            
            <button class="add-btn" onclick="location.href='/add-items'">Add New Items</button>
        </main>
    </div>
</body>
</html>
