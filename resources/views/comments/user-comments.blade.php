@extends('layouts.app1')

@section('title', 'User Info')

@section('content')

<div>
    <button><a href="/users/{{ $user->id }}">See Posts</a></button>
    <button><a href="/users/{{ $user->id }}/comments">See comments</a></button>
</div>

<h1>{{$user->name}}'s Comments:</h1>

<div class="post-container">

    <ul>
        @foreach ($comments as $comment)

        <h1> {{ $comment->post->Title }}</h1>
        <p>{{ $comment->post->Description }}</p>
        <h3>{{$user->name}} Commented:</h3>
        <p>{{ $comment->Description }}</p>
        @endforeach
    </ul>
</div>

<button><a href="/feed">Back</a></button>
@endsection