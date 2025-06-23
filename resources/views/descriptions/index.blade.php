<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deskripsi Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Deskripsi Home</h2>
        <div class="card">
            <div class="card-body">
                @if ($homeDescriptions)
                    @php
                        $homeDescription = $homeDescriptions->first();
                    @endphp
                    <h4>{{ $homeDescription->title }}</h4>
                    <p>{{ $homeDescription->description }}</p>
                    @if ($homeDescription->image)
                        <img src="{{ asset('storage/' . $homeDescription->image) }}" class="img-fluid mt-3"
                            alt="Deskripsi">
                    @endif
                    <a href="{{ route('descriptions.edit', $homeDescription->id) }}"
                        class="btn btn-warning mt-3">Edit</a>
                    <form action="{{ route('descriptions.delete', $homeDescription->id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                    @else
                    <p>Tidak ada data Home Description.</p>
                    <a href="{{ route('descriptions.create') }}" class="btn btn-primary mt-3">Tambah Deskripsi Baru</a>
                @endif
                
            </div>
        </div>

        <!-- Garis pemisah -->
<hr class="my-5">

         {{-- Home Services --}}
         <h2 class="mb-3">Layanan</h2>
         <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>
         @if ($services->count())
             <div class="row">
                 @foreach ($services as $service)
                     <div class="col-md-4">
                         <div class="card mb-4 h-100">
                             <div class="card-body">
                                 <h5><i class="{{ $service->icon }}"></i> {{ $service->title }}</h5>
                                 <p>{{ $service->description }}</p>
                                 <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                 <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus layanan ini?')">Hapus</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         @else
             <p>Belum ada layanan.</p>
         @endif
 
         <!-- Garis pemisah -->
<hr class="my-5">

         {{-- Home Products --}}
         <h2 class="mb-3">Produk</h2>
         <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>
         @if ($products->count())
             <div class="row">
                 @foreach ($products as $product)
                     <div class="col-md-4">
                         <div class="card mb-4 h-100">
                             @if ($product->image)
                                 <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                             @endif
                             <div class="card-body">
                                 <h5 class="card-title">{{ $product->name }}</h5>
                                 <h6 class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
                                 <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                 <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                 <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         @else
             <p>Belum ada produk.</p>
         @endif

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Beranda</a>
        <a href="{{ url('dashboard') }}" class="btn btn-dark mt-3">🔧 Kembali ke Dashboard</a>
    </div>
</body>

</html>
