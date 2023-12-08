@extends('layouts.app1')

@section('title', 'Comments')

@section('content')

    
    <div>
        <li>{{ $post->value('Title') }}
            <p>{{ $post->value('Description') }}</p>
        </li>
    </div>

    <div>
        @foreach($comments as $comment)
            <p>{{ $comment->Description }}<p>
        @endforeach

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
            <textarea class="textarea" type="text" name="description" value="{{ old('description') }}"> </textarea>
            <p>User ID: <input type="text" name="user_id" value="{{ old('title') }}"></p>
            <input type="submit" value="Submit">
        </form>
    </div>
    @endsection