<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <div class="container mt-4">
        <h2>Edit Layanan</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $service->title) }}" required>
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
            </div>
        
            <div class="mb-3">
                <label for="icon" class="form-label">Icon (opsional)</label>
                <input type="text" name="icon" id="icon" class="form-control"
                    value="{{ old('icon', $service->icon) }}">
            </div>
        
            <div class="mb-2">atau</div>
        
            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar (opsional)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($service->image)
                    <small>Gambar saat ini: <br><img src="{{ asset('storage/' . $service->image) }}" width="80" class="mt-2"></small>
                @endif
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dashboard.descriptions') }}" class="btn btn-secondary">Batal</a>
        </form>
        
    </div>
</body>

</html>
