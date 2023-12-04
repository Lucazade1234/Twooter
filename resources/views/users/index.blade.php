@extends('layouts.app')

@section('title', 'Users')

@section('content')

<p>Users of Twooter:</p>
    <ul>
        @foreach ($users as $user)
            <li> <a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
@endsection