@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit artikel Berita</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" placeholder="Masukan Judul Berita" value="{{ $berita->judul }}" name="judul" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" placeholder="Masukan deskripsi" value="{{ $berita->deskripsi }}" name="deskripsi" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <img src="{{ asset('/images/berita/' . $berita->cover) }}" width="100">
                                <input type="file" name="cover"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Terbit</label>
                                <input type="date" placeholder="Masukan Tanggal" value="{{ $berita->tanggal }}" name="tanggal" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
