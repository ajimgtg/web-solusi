<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pimpinan Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Pimpinan Fakultas</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pimpinan.update', $leader->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name', $leader->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <input type="text" name="position" id="position" class="form-control"
                       value="{{ old('position', $leader->position) }}" required>
            </div>

            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control"
                       value="{{ old('nip', $leader->nip) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $leader->email) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Profil</label>
                <textarea name="description" id="description" class="form-control" rows="4"
                          required>{{ old('description', $leader->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto Profil (boleh dikosongkan jika tidak diganti)</label>
                <input type="file" name="image" id="image" class="form-control">

                @if ($leader->image)
                    <div class="mt-2">
                        <p class="mb-1">Foto Saat Ini:</p>
                        <img src="{{ asset('storage/' . $leader->image) }}" alt="Foto Lama" width="100">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dashboard.leaders') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
