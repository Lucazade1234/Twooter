@extends('layouts.app')

@section('title', 'Feed')

@section('content')

<p>Twoots</p>
    <ul>
        @foreach ($posts as $post)
            <h1> Name: {{ $post->User->name }}</h1>
                <li> Title: {{ $post->Title }}
                    <p>Description: {{ $post->Description }}</p>
                    <p>Date Posted: {{ $post->date_of_post }}</p>
                </li>
        @endforeach

        {{ $posts->links('pagination::bootstrap-4') }}
        
    </ul>
@endsection