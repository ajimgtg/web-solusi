<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">LAB INSYDE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                        href="index.html">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('aboutus.public', 'pimpinan.public', 'visimisi.public', 'manajemen.public') ? 'active' : '' }}"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> Profil </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ Route::is('aboutus.public') ? 'active' : '' }}"
                                href="{{ route('aboutus.public') }}">Tentang Kami</a></li>
                        <li><a class="dropdown-item {{ Route::is('pimpinan.public') ? 'active' : '' }}"
                                href="{{ route('pimpinan.public') }}">Pimpinan Fakultas</a></li>
                        <li><a class="dropdown-item {{ Route::is('visimisi.public') ? 'active' : '' }}"
                                href="{{ route('visimisi.public') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item {{ Route::is('manajemen.public') ? 'active' : '' }}"
                                href="{{ route('manajemen.public') }}">Pengelola</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"> Layanan </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="konsultasi.html">Konsultasi TI</a></li>
                        <li><a class="dropdown-item" href="sertifikasi.html">Sertifikasi BNSP</a></li>
                        <li><a class="dropdown-item" href="sewa.html">Sewa LAB</a></li>
                        <li><a class="dropdown-item" href="pelatihan.html">Pelatihan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('product') ? 'active' : '' }}"
                        href="{{ route('product') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('news') ? 'active' : '' }}" href="{{ route('news') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
            <a class="btn btn-outline-light lg mr-2" href="#">Translate</a>
            <a href="https://wa.me/6285859980816" class="btn btn-outline-light lg" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
                WhatsApp
            </a>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
