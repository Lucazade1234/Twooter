@extends('layouts.app1')

@section('title', 'User Info')

@section('content')

<div>
    <button><a href="/users/{{ $user->id }}">See Posts</a></button>
    <button><a href="/users/{{ $user->id }}/comments">See Comments</a></button>
</div>

<h1>{{$user->name}}'s Twoots:</h1>

@foreach ($posts as $post)
<div class="post-container">

    

        <h1> {{ $post->Title }}</h1>
        <p>{{ $post->Description }}</p>
        <div class="image-container">
            @if ($post->image_path)
                <img src="{{ asset('images/' . $post->image_path) }}" class="post-image" alt="Post Image">
            @endif
        </div>
    

</div>
@endforeach
<button><a href="/feed">Back</a></button>
@endsection