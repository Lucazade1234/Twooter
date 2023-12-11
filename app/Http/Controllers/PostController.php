<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderByDesc('date_of_post')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return view('posts.create');
        } else{
            return redirect()->route('posts.index');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
       ]);

       $p = new Post;
       $p->title = $validatedData['title'];
       $p->description = $validatedData['description'];
       $p->user_id = auth()->id();
       $p->date_of_post = now();
       $p->save();

       session()->flash('message', 'Post Created');
       return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   

        $post = Post::find($id);
        try{

            $this->authorize('update', $post);
            return view('posts.edit', ['post' => $post]);

        }catch(AuthorizationException $e){
            session()->flash('message', 'User not authorized to edit this post');
            return back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the post
        $post = Post::find($id);

            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);

            // Check if the post exists
            if (!$post) {
                abort(404); // or handle it accordingly
            }

            // Update the post attributes
            $post->title = $request->input('title');
            $post->description = $request->input('description');

            // Save the changes
            $post->save();

            session()->flash('message', 'Post edited succesfully');
            return redirect()->route('posts.index');
    }

        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
    
        try {
            $this->authorize('delete', $post);
            Post::destroy($id);
            session()->flash('message', 'Post deleted successfully');
            return redirect()->route('posts.index');
        } catch (AuthorizationException $e) {
            session()->flash('message', 'You are not allowed to delete this post');
            return redirect()->back();
        }
    }
    
}
