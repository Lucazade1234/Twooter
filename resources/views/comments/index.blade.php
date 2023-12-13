@extends('layouts.app1')

@section('title', 'Comments')

@section('content')


<div class="post-container">
    <h1>{{ $post->value('Title')}}</h1>
    <div class="image-container">
        @if ($post->value('image_path'))
        <img src="{{ asset('images/' . $post->value('image_path')) }}" class="post-image" alt="Post Image">
        @endif
    </div>
    <p><strong>Description:</strong> {{ $post->value('Description') }}</p>
    <p><strong>Date Posted:</strong> {{ $post->value('date_of_post') }}</p>
</div>



<div class="centre-div">
    @foreach($comments as $comment)

    <div class="post-container">
        <p>{{ $comment->Description }}</p>
    </div>
        @endforeach


    <form method="POST" action="{{ route('comments.store', ['id' => $post->value('id')]) }}">
        @csrf
        <textarea class="commmenttextarea" type="text" name="description" value="{{ old('description') }}"></textarea>
        <input type="submit" value="Submit">
    </form>

    <form method="GET" action="{{ route('posts.index')}}">
        <button>back</button>
    </form>
</div>
@endsection