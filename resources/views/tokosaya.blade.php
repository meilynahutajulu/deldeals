<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="{{asset('css/tokosaya.css')}}">
</head>
<body>
@include('layout.wallpaper')
<div class="container">
    @include('layout.searchbar')
    @include('layout.sidebar')

    <main class="content">
        <div class="product-grid">
            @if($item->isEmpty())
                <p>Tidak ada produk yang tersedia.</p>
            @else
                @foreach ($item as $items)
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('storage/' . $items->image) }}" alt="{{ $items->name }}">
                        </div>
                        <div class="card-info">
                            <p class="text-title">{{ $items->name }}</p>
                            <p class="text-body">{{ $items->description }}</p>
                        </div>
                        <div class="card-footer">
                            <span class="text-title">Rp {{ number_format($items->price, 2, ',', '.') }}</span>
                            <form action="{{ route('item.remove', $items->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')">-</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
                    {{-- @if($item->isEmpty())
                <p>Tidak ada produk yang tersedia.</p>
            @else
                @foreach ($item as $items)
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('storage/' . $items->image) }}" alt="{{ $items->name }}">
                        </div>
                        <div class="card-info">
                            <p class="text-title">{{ $items->name }}</p>
                            <p class="text-body">{{ $items->description}}</p>
                        </div>
                        <div class="card-footer">
                            <span class="text-title">Rp {{ number_format($items->price, 2, ',', '.') }}</span>
                            <form action="{{ route('item.remove', $items->id) }}" method="POST" class="card-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-min" onclick="return confirm('Yakin ingin menghapus barang ini?')">-</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div> --}}

        <button class="add-btn" onclick="location.href='/add-items'">Add New Items</button>
    </main>
</div>
</body>
</html>