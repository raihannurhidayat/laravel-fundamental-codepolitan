@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
    <h1>Buat Blog Baru</h1>
    <form action="{{ url('/posts') }}" class="form-control" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button style="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
