<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="{{ asset('css/tokosaya.css') }}">
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

        /* Card footer */
        .card-footer {
            display: flex;
            justify-content: space-between; /* Ensure price and buttons are spaced out */
            align-items: center;
            width: 100%;
            gap: 10px;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Styling for delete and edit buttons */
        .delete-btn,
        .edit-button {
            background-color: black;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center; /* Ensures text is centered */
        }

        /* Hover effect for both delete and edit buttons */
        .delete-btn:hover,
        .edit-button:hover {
            background-color: gray;
        }

        /* General styles for Add New Items button */
        .add-btn {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .add-btn:hover {
            background-color: gray;
        }
    </style>
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
                            <div class="action-buttons">
                                <form id="deleteForm-{{ $items->id }}" action="{{ route('item.remove', $items->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-btn" data-id="{{ $items->id }}">Hapus</button>
                                </form>
                                <a href="{{ route('item.edit', $items->id) }}" class="edit-button">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <button class="add-btn" onclick="location.href='/add-items'">Add New Items</button>
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
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            deleteFormId = this.getAttribute('data-id');
            modal.style.display = 'flex';
        });
    });

    // Confirm delete
    confirmDeleteButton.addEventListener('click', function () {
        if (deleteFormId) {
            document.getElementById(`deleteForm-${deleteFormId}`).submit();
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