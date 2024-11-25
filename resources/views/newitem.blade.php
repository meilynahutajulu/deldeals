<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelDeals Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/utama.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newitem.css') }}">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @include('layout.wallpaper')

    <div class="container">
        @include('layout.sidebar')
        @include('layout.searchbar')

        <!-- Main Content -->
        <main class="content">
            <!-- Add New Item Modal -->
            <div id="add-item-modal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Add New Item</h2>
                    <form id="add-item-form" action="{{ route('items.store') }}" method="POST">
                        @csrf
                        <label for="name">Item Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" required>

                        <label for="image">Image URL:</label>
                        <input type="text" id="image" name="image" required>

                        <button type="submit">Add Item</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.querySelector('.add-btn').addEventListener('click', function() {
            document.getElementById('add-item-modal').style.display = 'block';
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('add-item-modal').style.display = 'none';
        });
    </script>
</body>
</html>