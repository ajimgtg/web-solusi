<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">About Us</h2>
        <div class="card">
            <div class="card-body">
                @if (isset($aboutUs) && $aboutUs) <!-- Cek apakah ada data -->
                    <p>{{ $aboutUs->description }}</p>

                    @if (!empty($aboutUs->image)) <!-- Cek apakah ada gambar -->
                        <img src="{{ asset('storage/' . $aboutUs->image) }}" class="img-fluid mt-3" alt="About Us">
                    @endif

                    <!-- Tombol Edit -->
                    <a href="{{ route('aboutus.edit', $aboutUs->id) }}" class="btn btn-warning mt-3">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('aboutus.destroy', $aboutUs->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                @else
                    <p>Tidak ada data About Us.</p>
                    <a href="{{ route('aboutus.create') }}" class="btn btn-primary mt-3">Tambah About Us</a>
                @endif
            </div>
        </div>

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Beranda</a>
        <a href="{{ url('dashboard') }}" class="btn btn-dark mt-3">🔧 Kembali ke Dashboard</a>
    </div>
</body>

</html>
