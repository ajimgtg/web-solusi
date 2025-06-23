<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Visi & Misi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($visions->count())
            @foreach ($visions as $vision)
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Visi</h4>
                        <p>{{ $vision->vision }}</p>

                        <h5>Misi</h5>
                        <ol>
                            @foreach (explode("\n", $vision->mission) as $missionItem)
                                <li>{{ trim($missionItem) }}</li>
                            @endforeach
                        </ol>

                        <div class="mt-3">
                            <a href="{{ url('dashboard/visimisi/edit/' . $vision->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('visimisi.destroy', $vision->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Belum ada data visi & misi.</p>
            <a href="{{ url('dashboard/visimisi/create') }}" class="btn btn-primary">Tambah Visi & Misi</a>
        @endif

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Beranda</a>
        <a href="{{ url('dashboard') }}" class="btn btn-dark mt-3">🔧 Kembali ke Dashboard</a>
    </div>
</body>

</html>
