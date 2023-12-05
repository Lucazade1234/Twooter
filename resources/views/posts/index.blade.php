@extends('layouts.app')

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
                        <button>Comment</button>
                        <button>Upvote</button>
                        <button>Downvote</button>

                    </li>
            @endforeach

            {{ $posts->links('pagination::bootstrap-4') }}
        
        </ul>

    </div>

    
@endsection