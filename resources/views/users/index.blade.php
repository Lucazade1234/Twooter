@extends('layouts.app')

@section('title', 'Users')

@section('content')

<livewire:counter></livewire:counter>
<p>Users of Twooter:</p>
    <ul>
    

        @foreach ($users as $user)
            <li> <a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
        @endforeach

        @php
            dd($users);
        @endphp
    </ul>
@endsection