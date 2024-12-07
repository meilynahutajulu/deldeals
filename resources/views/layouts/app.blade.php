<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">  
    <script>
        function toggleEdit() {
            document.getElementById('edit-section').style.display = 'block';
            document.getElementById('view-section').style.display = 'none';
        }

        function cancelEdit() {
            document.getElementById('edit-section').style.display = 'none';
            document.getElementById('view-section').style.display = 'block';
        }
    </script>
</head>
<body>
    <!-- wallpaper -->
    @include('layout.wallpaper')
    <!-- Sidebar with Logo -->
    @include('layout.sidebar')
    @if (!isset($showSearchBar) || $showSearchBar)
        @include('layout.searchbar')
    @endif


<main>

    @if (!isset($showSearchBar) || $showSearchBar)
        @include('layout.searchbar')
    @endif

    <div class="profile-content">
        @yield('content')
    </div>

</main>
<script src="{{ asset('js/editprofile.js')}}"></script>
</body>
</html>
