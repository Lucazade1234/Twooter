@extends('layouts.app1')

@section('title', 'Add Post')

@section('content')
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
        <textarea class="textarea" type="text" name="description" value="{{ old('description') }}"> </textarea>
        
        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*">

        <input type="submit" value="Submit">
</form>


@endsection