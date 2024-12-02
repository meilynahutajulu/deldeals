<!-- resources/views/tokosaya.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="css/layout/searchbar.css">
    <link rel="stylesheet" href="css/tokosaya.css"> <!-- Pastikan untuk mengimpor CSS yang relevan -->
</head>
<body>
<!-- wallpaper -->
@include('layout.wallpaper')
    <div class="container">
        <!-- Sidebar with Logo -->
        @include('layout.sidebar')

        <!-- Main content area -->
        <main class="content">
            <!-- Search Bar with Profile Icon and Dropdown -->
            <div class="search-bar" style="display: flex; align-items: center; justify-content: space-between;">
                <form action="{{ url('/tokosaya') }}" method="GET" style="flex: 1; display: flex;">
                    <input type="text" name="search" placeholder="Cari..." style="flex: 1; padding: 8px; border: 1px solid #ddd; border-radius: 20px;">
                    <button type="submit" style="background-color: rgba(0, 0, 0, 1); color: #fff; border: none; border-radius: 70px; padding: 8px; margin-left: 10px; cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>
                    </button>
                </form>

                <div class="icons" style="display: flex; align-items: center; gap: 15px; position: relative;">
                    <!-- Icon Bell -->
                    @include('layout.bell')

                    <!-- Icon Profil -->
                    @include('layout.profileicon')

                    <!-- Icon Cart -->
                    @include('layout.carticon')
                        
                    <!-- Icon Info -->
                    @include('layout.infoicon')
                </div>
            </div>
        </main>
    </div>
</body>
</html>