<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lab Insyde</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header text-center">
                <h4>Lab Insyde Admin</h4>
            </div>
            <ul class="list-unstyled components">
                <li><a href="{{ route('dashboard.descriptions') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('dashboard.aboutus') }}"><i class="fas fa-info-circle"></i> Tentang Kami</a></li>
                <li><a href="{{ route('dashboard.leaders') }}"><i class="fas fa-user-tie"></i> Pimpinan</a></li>
                <li><a href="{{ route('dashboard.vision') }}"><i class="fas fa-bullseye"></i> Visi & Misi</a></li>
                <li><a href="{{ route('dashboard.management') }}"><i class="fas fa-users-cog"></i> Manajemen</a></li>
                <li><a href="{{ url('dashboard.services') }}"><i class="fas fa-cogs"></i> Layanan</a></li>
                <li><a href="{{ url('dashboard.products') }}"><i class="fas fa-box"></i> Produk</a></li>
                <li><a href="{{ route('logout') }}" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Dashboard</span>
                    <span class="text-muted">Selamat datang, {{ Auth::user()->username }}!</span>
                </div>
            </nav>

            <div class="container mt-4">
                {{-- Jika ada parameter "page" di query string, include halaman dashboard yang bersangkutan.
                     Pastikan hanya file yang diizinkan yang bisa di-include untuk keamanan. --}}
                @if (request('page'))
                    @include('dashboard.pages.' . request('page'))
                @else
                    <h4>Selamat datang di Dashboard Admin Lab Insyde.</h4>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
