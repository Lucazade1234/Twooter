@extends('layouts.app')

@section('title', 'User Info')

@section('content')

<p>This {{$user->name}}'s Twoots:</p>
    <ul>
        @foreach ($posts as $post)

            <li>{{ $post->Title }}
                <p>{{ $post->Description }}</p>
            </li>
        @endforeach
    </ul>
@endsection