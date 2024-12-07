<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/layout/utama.css') }}">
</head>
<body>
    @include('layout.wallpaper')
    <div class="container">
        @include('layout.sidebar')
        @include('layout.searchbar')

        <!-- Main Content -->
        <main class="content">
            <section class="product-list">
                @if(isset($items) && !$items->isEmpty())
                    @foreach ($items as $item)
                        <div class="product-card">
                            <div class="image-container">
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p>Rp {{ number_format($item->price, 2, ',', '.') }}</p>
                            <button class="add-to-cart">+</button>
                        </div>
                    @endforeach
                @else
                    <p>Tidak ada produk yang tersedia.</p>
                @endif
            </section>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>