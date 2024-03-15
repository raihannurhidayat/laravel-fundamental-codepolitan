@extends('layouts.app')

@section('title', "Judul : $post->title")

@section('content')
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"> {{ $post->title }} </h2>
        <p class="blog-post-meta"> {{ date('d M Y H:i', strtotime($post->created_at)) }}</p>

        <p>{{ $post->content }}</p>

        <small class="text-muted">
            {{ $count }} Komentar
        </small>

        @foreach ($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p style="font-size: 8pt">{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach

    </article>
    <a href="{{ url('/posts') }}" class="btn btn-secondary">Kembali</a>
@endsection
