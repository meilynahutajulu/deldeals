<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/utama.css') }}">
</head>
<body>
    @include('layout.wallpaper')
    <div class="container">
        @include('layout.sidebar')
        @include('layout.searchbar')

        <!-- Main Content -->
        <main class="content">
            
                <div class="product-grid">
                    @if($item->isEmpty())
                        @if(request('search'))
                            <p>Produk dengan nama "{{ request('search') }}" tidak ditemukan.</p>
                        @else
                            <p>Tidak ada produk yang tersedia.</p>
                        @endif
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
           
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>