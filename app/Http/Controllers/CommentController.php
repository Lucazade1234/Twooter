<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Mail\CommentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:1000',
       ]);

       $c = new Comment;
       $c->Description = $validatedData['description'];
       $c->post_id = $id;
       $c->user_id = Auth::id();
       $c->date_of_post = now();
       $c->save();

       $post = Post::find($id);

       session()->flash('message', 'Comment added.');
       Mail::to($post->user->email)->send(new CommentMail($post));
       return redirect()->route('comments.show', ['id' => $id]);
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::where('post_id', $id)->get();
        $post = Post::where('id', $id)->get();
        return view('comments.index', ['comments' => $comments], ['post' => $post]);
    }

    public function showUsersComments(string $id)
    {
        $comments = Comment::where('user_id', $id)->get();
        $user = User::find($id);
        return view('comments.user-comments', ['comments' => $comments], ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
