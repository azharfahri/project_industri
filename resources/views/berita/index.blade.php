@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Berita</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('berita.create') }}" type="button" class="btn btn-primary">Tambah Berita</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($berita as $data)
                            <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->cover }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>
                                <form action="{{ route('berita.destroy',$data->id) }}" method="POST">
                                <a href="{{ route('berita.edit',$data->id) }}" type="button" class="btn btn-success">Edit</a>
                                <a href="{{ route('berita.show',$data->id) }}" type="button" class="btn btn-warning">Show</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
