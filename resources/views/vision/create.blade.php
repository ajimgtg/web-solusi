<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Visi & Misi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Visi & Misi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('visimisi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="vision" class="form-label">Visi</label>
                <textarea name="vision" id="vision" class="form-control" required>{{ old('vision') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="mission" class="form-label">Misi (masukkan poin-poin, pisahkan dengan ENTER)</label>
                <textarea name="mission" id="mission" class="form-control" rows="5" required>{{ old('mission') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dashboard.vision') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
