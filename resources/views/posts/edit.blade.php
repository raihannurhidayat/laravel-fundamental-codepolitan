@extends('layouts.app')

@section('title', 'Edit Blog')
@section('content')
    <h1>Update Blog</h1>
    <form action="{{ url("posts/{$post->id}") }}" method="POST" class="form-control">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $post->title }}" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <button style="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
