<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS - Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/keranjang.css') }}">
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
            background-color: white;
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
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-confirm {
            background-color: #d9534f;
            color: white;
        }
        .btn-cancel {
            background-color: green;
            color: white;
        }
    </style>
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
                        <h2>
                            <a href="{{ route('item.details', $item->item_id) }}" style="text-decoration: none; color: inherit;">
                                {{ $item->item->name }}
                            </a>
                        </h2>
                        <p>Rp {{ number_format($item->item->price, 2, ',', '.') }}</p>
                    </div>
                    <form id="deleteCartItem-{{ $item->item->id }}" action="{{ route('keranjang.remove', $item->item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="remove-item" data-id="{{ $item->item->id }}">Hapus</button>
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

    <!-- Modal structure -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <p>Yakin ingin menghapus barang ini?</p>
            <div class="modal-buttons">
                <button id="confirmDelete" class="btn btn-confirm">Ya</button>
                <button id="cancelDelete" class="btn btn-cancel">Batal</button>
            </div>
        </div>
    </div>

    <script>
        let modal = document.getElementById('confirmModal');
        let confirmDeleteButton = document.getElementById('confirmDelete');
        let cancelDeleteButton = document.getElementById('cancelDelete');
        let deleteFormId = null;

        // Open modal and set the form ID
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function () {
                deleteFormId = this.getAttribute('data-id');
                modal.style.display = 'flex';
            });
        });

        // Confirm delete
        confirmDeleteButton.addEventListener('click', function () {
            if (deleteFormId) {
                document.getElementById(`deleteCartItem-${deleteFormId}`).submit();
            }
            modal.style.display = 'none';
        });

        // Cancel delete
        cancelDeleteButton.addEventListener('click', function () {
            modal.style.display = 'none';
            deleteFormId = null;
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                deleteFormId = null;
            }
        });
    </script>
</body>
</html>
