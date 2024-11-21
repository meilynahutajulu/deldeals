<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="css/editprofile.css">  
</head>
<body>
    <!-- wallpaper -->
@include('layout.wallpaper')
    <div class="container">
        <!-- Sidebar with Logo -->
        @include('layout.sidebar')

        <main class="profile-content">
        <div class="search-bar" style="display: flex; align-items: center; justify-content: space-between;">
            <h3>Pofil Pengguna</h3>

    <div class="icons" style="display: flex; align-items: center; gap: 15px; position: relative;">
            <div class="bell-icon" onclick="toggleDropdown()" style="cursor: pointer;">
                <!-- Bell Icon (SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                </svg>
            </div>
                <!-- Profile Icon with Dropdown -->
        <!-- <div class="profile-dropdown" style="position: relative;"> -->
            <div class="profile-icon" onclick="toggleDropdown()" style="cursor: pointer;">
                <!-- Profile Icon (SVG) -->
                <a href="{{ url('/editprofile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                </a>
            </div>    
            <div class="cart-icon" onclick="toggleDropdown()" style="cursor: pointer;">
                <!-- Cart Icon (SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
            </div>
            <div class="info-icon" onclick="toggleDropdown()" style="cursor: pointer;">
                <!-- Info Icon (SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg>
            </div>
    </div>
</div>
            <h1>Profil Pengguna</h1>
        <div class="profile-card">
            <div class="profile-picture">
                <img src="img/profile.jpg" alt="Profile Picture">
            </div>
            <div class="profile-details">
    <p><strong>Username:</strong> <span id="username-text">@bernadyaaa_1bulan</span>
        <input type="text" id="username-input" value="@bernadyaaa_1bulan" style="display: none;"></p>

    <p><strong>Nama:</strong> <span id="name-text">Bernadya Simangunsong</span>
        <input type="text" id="name-input" value="Bernadya Simangunsong" style="display: none;"></p>

    <p><strong>NIM:</strong> <span id="nim-text">12S22000</span>
        <input type="text" id="nim-input" value="12S22000" style="display: none;"></p>

    <p><strong>Email:</strong> <span id="email-text">bernadyassssssss123x@gmail.com</span>
        <input type="email" id="email-input" value="bernadyassssssss123x@gmail.com" style="display: none;"></p>

    <p><strong>No. Handphone:</strong> <span id="phone-text">08131234567</span>
        <input type="text" id="phone-input" value="08131234567" style="display: none;"></p>

    <button id="edit-btn" onclick="toggleEdit()">Edit
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
            </svg>
    </button>
    <button id="save-btn" onclick="saveBio()" style="display: none;">Save</button>
</div>

        </div>    
        </main>
    </div>

    <script src="js/editprofile.js"></script>
</body>
</html>
