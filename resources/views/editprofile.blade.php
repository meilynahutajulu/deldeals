<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="css/editprofile.css">  
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
    <!-- Wallpaper -->
    @include('layout.wallpaper')
    <div class="container">
        <!-- Sidebar -->
        @include('layout.sidebar')

        <main class="profile-content">
            <h1>Profil Pengguna</h1>
            <!-- View Profile Section -->
            <div id="view-section">
                <div class="profile-card">
                    <div class="profile-picture">
                        <img src="{{ asset('img/profile.jpg') }}" alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <p><strong>Username:</strong> {{ $user->username }}</p>
                        <p><strong>Nama Lengkap:</strong> {{ $user->full_name }}</p>
                        <p><strong>NIM:</strong> {{ $user->nim }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                </div>
                <button onclick="toggleEdit()">Edit Profil</button>
            </div>

            <!-- Edit Profile Section -->
            <div id="edit-section" style="display: none;">
                <form action="{{ route('pengguna.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ $user->username }}" required>

                    <label>Nama Lengkap:</label>
                    <input type="text" name="full_name" value="{{ $user->full_name }}" required>

                    <label>NIM:</label>
                    <input type="text" name="nim" value="{{ $user->nim }}" required>

                    <label>Email:</label>
                    <input type="email" name="email" value="{{ $user->email }}" required>

                    <button type="submit">Simpan</button>
                    <button type="button" onclick="cancelEdit()">Batal</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
