<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Import Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/layou/itemdetails.css') }}">
</head>
<body>
    <!-- Wallpaper Background -->
    @include('layout.wallpaper')

    <!-- Main Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3" id="sidebar">
                @include('layout.sidebar')
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <main class="py-4">
                    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                        <!-- Card -->
                        <div class="card detail-card p-4">
                            <!-- Header -->
                            <div class="text-center">
                                <h4>Detail Barang</h4>
                            </div>
                            <!-- Content -->
                            <div class="row align-items-center">
                                <!-- Product Image -->
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset($selectedItem['image']) }}" alt="{{ $selectedItem['name'] }}" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                                <!-- Product Information -->
                                @if(!empty($selectedItem))
                            <div class="col-md-8">
                             <p><strong>Nama Barang:</strong> {{ $selectedItem['name'] }}</p>
                                 <p><strong>Nama Penjual:</strong> {{ $selectedItem['seller'] }}</p>
                             <p class="fw-bold text-danger"><strong>Harga:</strong> Rp {{ number_format($selectedItem['price'], 0, ',', '.') }}</p>
                                     <p><strong>Deskripsi:</strong> {{ $selectedItem['description'] }}</p>
                                     </div>
                                    <!-- @endif -->
                            </div>
                            <!-- Footer -->
                            <div class="card-footer text-center">
                            @if(!empty($selectedItem['contact']))
                                <a href="https://wa.me/{{ $selectedItem['contact'] }}" class="btn btn-success">
                                    <i class="bi bi-whatsapp"></i> Hubungi Penjual
                                     </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Import Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
