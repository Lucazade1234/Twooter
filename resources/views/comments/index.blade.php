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
            <p>-------------------------------</p>
            <p>{{ $comment->Description }}<p>
        @endforeach
    </div>



    <form method="POST" action="{{ route('comments.store', ['id' => $post->value('id')]) }}">
        @csrf
        <textarea class="commmenttextarea" type="text" name="description" value="{{ old('description') }}"></textarea>
        <input type="submit" value="Submit">
    </form>

    <form method="GET" action="{{ route('posts.index')}}">
        <button>back</button>
    </form>
    @endsection 