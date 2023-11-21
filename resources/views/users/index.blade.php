@extends('layouts.app')

@section('title', 'Users')

@section('content')

<p>Users of Twooter:</p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection