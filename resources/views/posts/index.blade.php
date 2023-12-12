@extends('layouts.app1')

@section('content')


<div class="side-pane">
    <button><a href="/addPost">Add Post</a></button>
</div>

<p>___________________________________________________________________________________________________</p>

<div>
    <ul>
        @foreach ($posts as $post)
        <div class="post-container">
            <h1>{{ $post->Title }}</h1>
            <a href="/users/{{ $post->User->id }}">{{ $post->User->name }}</a>
            <p>Description: {{ $post->Description }}</p>
            <p>Date Posted: {{ $post->date_of_post }}</p>

            <div class="image-container">
                @if ($post->image_path)
                <img src="{{ asset('images/' . $post->image_path) }}" class="post-image" alt="Post Image">
                @endif
            </div>

            <button> <a href="/comments/{{ $post->id }}">Comment</a></button>
            <button> <a href="/feed/editPost/{{ $post->id }}">Edit Post</a></button>
            <p> </p>
            <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete Post">
            </form>
            <p>_______________________________________________________________________________________</p>
        </div>
        @endforeach

        {{ $posts->links('pagination::bootstrap-4') }}

    </ul>
</div>

@endsection
