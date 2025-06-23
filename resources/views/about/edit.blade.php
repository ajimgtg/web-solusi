@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit About Us</h2>
    <form action="{{ route('aboutus.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $aboutus->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required>{{ $aboutus->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/'.$aboutus->image) }}" alt="Current Image" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
