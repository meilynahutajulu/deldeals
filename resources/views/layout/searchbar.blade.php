<link rel="stylesheet" href="{{ asset('css/layout/searchbar.css')}}">

<div class="container">
    <main class="content">
        <!-- Search bar dengan ikon profil, keranjang, lonceng, dan info -->
        <div class="search-bar" style="display: flex; align-items: center; justify-content: space-between;">
            <!-- Form pencarian -->
            <form action="{{ route('main') }}" method="GET" style="flex: 1; display: flex;">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari..." 
                    value="{{ request('search') }}" 
                    style="flex: 1; padding: 8px; border: 1px solid #ddd; border-radius: 20px;"
                >
                <button 
                    type="submit" 
                    style="
                        background-color: rgba(0, 0, 0, 1); 
                        color: #fff; 
                        border: none; 
                        border-radius: 70px; 
                        padding: 8px; 
                        margin-left: 10px; 
                        cursor: pointer;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>
            

            <!-- Ikon navigasi tambahan -->
            <div class="icons" style="display: flex; align-items: center; gap: 15px; position: relative;">

                <!-- Ikon Profil -->
                @include('layout.profileicon')

                <!-- Ikon Keranjang -->
                @include('layout.carticon')
            </div>
        </div>
    </main>
</div>

