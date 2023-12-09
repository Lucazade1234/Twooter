@extends('layouts.app1')

@section('title', 'Edit Post')

@section('content')
<form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
        @csrf
        @method('PUT')
        <p>Title: <input type="text" name="title" value="{{ $post->Title }}"></p>
        <textarea class="textarea" type="text" name="description" value="{{ $post->Description }}"> {{ $post->Description }} </textarea>
        <input type="submit" value="Submit">
</form>


@endsection