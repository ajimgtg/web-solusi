<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Leaders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Pimpinan Fakultas</h2>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah -->
        <a href="{{ route('pimpinan.create') }}" class="btn btn-primary mb-3">Tambah Pimpinan</a>

        <!-- Tabel Data -->
        <div class="card">
            <div class="card-body table-responsive">
                @if($leaders->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Deskripsi</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaders as $leader)
                        <tr>
                            <td>
                                @if ($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}" alt="Foto" width="80">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $leader->name }}</td>
                            <td>{{ $leader->position }}</td>
                            <td>{{ $leader->description }}</td>
                            <td>{{ $leader->nip }}</td>
                            <td>{{ $leader->email }}</td>
                            <td>
                                <a href="{{ route('pimpinan.edit', $leader->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pimpinan.destroy', $leader->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="text-muted">Belum ada data pimpinan.</p>
                @endif
            </div>
        </div>

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Beranda</a>
        <a href="{{ url('dashboard') }}" class="btn btn-dark mt-3">🔧 Kembali ke Dashboard</a>
    </div>
</body>

</html>
