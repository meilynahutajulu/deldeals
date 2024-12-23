<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/utama.css') }}">
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: black;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
        .modal-buttons {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 135px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: green;
            color: white;
        }
    </style>
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

    <!-- Modal structure -->
    @if(session('error'))
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <p>{{ session('error') }}</p>
            <div class="modal-buttons">
                <button onclick="closeModal()" class="btn btn-cancel">Tutup</button>
            </div>
        </div>
    </div>
    @endif

    <script>
        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("errorModal").style.display = "none";
        }

        // Jika ada error, tampilkan modal
        @if(session('error'))
            document.getElementById("errorModal").style.display = "flex";
        @endif
    </script>
</body>
</html>
