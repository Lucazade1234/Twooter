@extends('layouts.app1')


@section('content')


<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<style>
    .nav-link {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 10px;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .nav-link:hover {
        background-color: #0056b3;
    }
</style>

<nav class="navbar">
    <a href="/dashboard" class="nav-link">Dashboard</a>
    <a href="/addPost" class="nav-link">Add Post</a>
    <div class="joke-container">
        <h2>{{ $joke }}</h2>
    </div>
</nav>


<div>
    <ul>

        @foreach ($posts as $post)
        <div class="post-container">
            <h1>{{ $post->Title }}</h1>
            <div class="image-container">
                @if ($post->image_path)
                <img src="{{ asset('images/' . $post->image_path) }}" class="post-image" alt="Post Image">
                @endif
            </div>
            <p><strong>Author:</strong> <a href="/users/{{ $post->User->id }}">{{ $post->User->name }}</a></p>
            <p><strong>Description:</strong> {{ $post->Description }}</p>
            <p><strong>Date Posted:</strong> {{ $post->date_of_post }}</p>

            <div class="button-container">
                <button><a href="/comments/{{ $post->id }}">Comment</a></button>
                <button><a href="/feed/editPost/{{ $post->id }}">Edit Post</a></button>

                <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Post</button>
                </form>
            </div>
        </div>
</div>
@endforeach

{{ $posts->links('pagination::bootstrap-4') }}
</ul>
</div>

@endsection