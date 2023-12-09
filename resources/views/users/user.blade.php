@extends('layouts.app1')

@section('title', 'User Info')

@section('content')

<div>
    <button><a href="/users/{{ $user->id }}">See Posts</a></button>
    <button><a href="/users/{{ $user->id }}/comments">See Comments</a></button>
</div>


<div class="">
    <h1>{{$user->name}}'s Twoots:</h1>
        <ul>
            @foreach ($posts as $post)

                <h1> {{ $post->Title }}</h1>
                <p>{{ $post->Description }}</p>
                <p>______________________________________________</p>
              
            @endforeach
        </ul>
</div>

<button><a href="/feed">Back</a></button>
@endsection