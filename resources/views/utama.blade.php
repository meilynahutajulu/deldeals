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
                        <h4>Tidak ada produk yang tersedia</h4>
                    @endif
                @else
                    @foreach ($item as $items)
                    <div class="product-card">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $items->image) }}" alt="{{ $items->name }}">
                        </div>
                        
                        <h3>
                             <a href="{{ route('item.details', $items->id) }}" style="text-decoration: none; color: inherit;">
                                  {{ $items->name }}
                             </a>
                        </h3>
                        <p>Rp {{ number_format($items->price, 2, ',', '.') }}</p>
                        <form action="{{ route('keranjang.add', $items->id) }}" method="POST">
                            @csrf
                            <button class="add-to-cart">+</button>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </main>
    </div>
</body>
</html>
