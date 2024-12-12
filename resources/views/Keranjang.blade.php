<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS - Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/keranjang.css') }}">
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
                @forelse ($keranjang as $item)
                <div class="cart-item">
                    <img src="{{ asset('storage/' . $item->item->image) }}" alt="{{ $item->item->name }}">
                    <div class="cart-item-details">
                        <h2>{{ $item->item->name }}</h2>
                        <p>Rp {{ number_format($item->item->price, 2, ',', '.') }}</p>
                    </div>
                    <form action="{{ route('keranjang.remove', $item->item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="remove-item">Hapus</button>
                    </form>
                </div>
                @empty
                <p>Keranjang Anda kosong.</p>
                @endforelse

                @if($keranjang->isNotEmpty())
                <div class="cart-total">
                    <p>Total item: {{ $keranjang->count() }}</p>
                </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
