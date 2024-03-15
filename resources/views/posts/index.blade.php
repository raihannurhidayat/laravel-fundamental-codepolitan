@extends('layouts.app')

@section('title', 'Welcome to Blog')

@section('content')
    <h1 class="">Blog Ready
        <a href="{{ url('posts/create') }}" class="btn btn-success">+ Buat Postingan</a>
    </h1>
    <h5 class="my-4">Welcome {{ $user }}</h5>
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-body-secondary">Last Updated at
                        {{ date('d M Y H:i', strtotime($post->updated_at)) }}
                    </small></p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Selengkapnya</a>
                <a href="{{ url("posts/edit/$post->id") }}" class="btn btn-warning">Perbaharui</a>
                <form action="{{ url("posts/$post->id") }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
