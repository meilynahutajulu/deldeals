<link rel="stylesheet" href="css/layout/searchbar.css">

<!-- Search Bar with Profile Icon and Dropdown -->
<div class="search-bar" style="display: flex; align-items: center; justify-content: space-between;">
    <input type="text" placeholder="Cari..." style="flex: 1; padding: 8px;">

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