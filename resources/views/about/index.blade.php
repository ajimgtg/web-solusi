@extends('layouts.app')

@section('content')
<div class="container">
    <h2>About Us</h2>
    <a href="{{ route('aboutus.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aboutus as $data)
            <tr>
                <td>{{ $data->title }}</td>
                <td>{{ $data->description }}</td>
                <td><img src="{{ asset('storage/'.$data->image) }}" width="100"></td>
                <td>
                    <a href="{{ route('aboutus.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('aboutus.destroy', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
