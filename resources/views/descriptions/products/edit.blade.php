<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Produk</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar (opsional)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image)
                    <small>Gambar saat ini: <br><img src="{{ asset('storage/' . $product->image) }}" width="80" class="mt-2"></small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dashboard.descriptions') }}" class="btn btn-secondary">Batal</a>
        </form>
        
    </div>
</body>

</html>
