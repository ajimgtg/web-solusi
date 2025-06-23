<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/custom/lg_nav2.png') }}" alt="LAB INSYDE" width="fit-content" height="44"
                style="border-radius: 5px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('aboutus.public', 'pimpinan.public', 'visimisi.public', 'manajemen.public') ? 'active' : '' }}"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> Profil </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ Route::is('aboutus.public') ? 'active' : '' }}"
                                href="{{ route('aboutus.public') }}">Tentang Kami</a></li>
                        <li><a class="dropdown-item {{ Route::is('pimpinan.public') ? 'active' : '' }}"
                                href="{{ route('pimpinan.public') }}">Anggota LAB</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('konsultasi', 'sertifikasi', 'sewa-lab', 'pelatihan', 'studio', 'studio.show') ? 'active' : '' }}"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> Layanan </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ Route::is('konsultasi') ? 'active' : '' }}"
                                href="{{ route('konsultasi') }}">Konsultasi TI</a></li>
                        <li><a class="dropdown-item {{ Route::is('sewa-lab') ? 'active' : '' }}"
                                href="{{ route('sewa-lab') }}">Sewa/Peminjaman LAB</a></li>
                        <li><a class="dropdown-item {{ Route::is('pelatihan') ? 'active' : '' }}"
                                href="{{ route('pelatihan') }}">Workshop</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('product', 'product.show') ? 'active' : '' }}"
                        href="{{ route('product') }}">Portofolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('news', 'news.show') ? 'active' : '' }}"
                        href="{{ route('news') }}">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
            @php
                use App\Models\Contact; // Import the Contact model
                $contact = Contact::first(); // Fetch the first contact record
                $phone = $contact ? $contact->whatsapp : null; // Get the phone number or null if no record exists
            @endphp
            {{-- <a class="btn btn-outline-light lg m-2" href="#">Translate</a> --}}
            <a href="https://wa.me/{{ $phone }}" class="btn btn-outline-light lg pr-2" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
                WhatsApp
            </a>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
