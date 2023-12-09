@extends('layouts.app1')

@section('title', 'Feed')

@section('content')

<p>Twoots</p>
    <div class="centered-div">
        <ul>
            @foreach ($posts as $post)
                <h1>{{ $post->Title }}</h1>
                    <li href> <a href="/users/{{ $post->User->id }}">{{ $post->User->name }}</a>
                        <p>Description: {{ $post->Description }}</p>
                        <p>Date Posted: {{ $post->date_of_post }}</p>
                        <button> <a href="/comments/{{ $post->id }}">Comment</a></button>
                        <button>Upvote</button>
                        <button>Downvote</button>
                        <button> <a href="/feed/editPost/{{ $post->id }}">Edit Post</a></button>
                    </li>
            @endforeach

            {{ $posts->links('pagination::bootstrap-4') }}
        
        </ul>

    </div>

    <div class="side-pane">
        <button><a href="/addPost">Add Post</a></button>
    </div>

    
@endsection