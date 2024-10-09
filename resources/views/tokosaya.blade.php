<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELDEALS</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/layout/wallpaper.css">
    <link rel="stylesheet" href="css/layout/sidebar.css">
    <link rel="stylesheet" href="css/layout/searchbar.css">
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

        </main>
    </div>
</body>
</html>
