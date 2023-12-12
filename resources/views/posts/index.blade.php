@extends('layouts.app1')

@section('title', 'Feed')

@section('content')


<div class="side-pane">
        <button><a href="/addPost">Add Post</a></button>
</div>

<p>______________________________________________</p>
    <div class="">
        <ul>
            @foreach ($posts as $post)
                <h1>{{ $post->Title }}</h1>
                    <a href="/users/{{ $post->User->id }}">{{ $post->User->name }}</a>
                        <p>Description: {{ $post->Description }}</p>
                        <p>Date Posted: {{ $post->date_of_post }}</p>

                        @if ($post->image_path)
                             <img src="{{ asset('storage/app/' . $post->image_path) }}" alt="Post Image">
                        @endif


                        <button> <a href="/comments/{{ $post->id }}">Comment</a></button>
                        <button> <a href="/feed/editPost/{{ $post->id }}">Edit Post</a></button>
                        <p> </p>
                        <form method="POST" action= "{{ route('posts.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete Post">
                        </form>
                        <p>______________________________________________</p>
                    
            @endforeach

            {{ $posts->links('pagination::bootstrap-4') }}
        
        </ul>

    </div>
    
@endsection