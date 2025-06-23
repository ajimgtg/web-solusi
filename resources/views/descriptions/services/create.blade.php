<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
<div class="container mt-4">
    <h2>Tambah Layanan</h2>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
    
        <div class="mb-3">
            <label for="icon" class="form-label">Icon (contoh: fa-solid fa-laptop)</label>
            <input type="text" name="icon" id="icon" class="form-control">
        </div>
    
        <div class="mb-2">atau</div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar (opsional, max 2MB)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('dashboard.descriptions') }}" class="btn btn-secondary">Batal</a>
    </form>
    
</div>
</body>
</html>
