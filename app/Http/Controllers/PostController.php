<?php

namespace App\Http\Controllers;


// Panggil model yang akan digunakan
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
Use Alert;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create condition if user is admin or editor get all post and if user is penulis get post by user id
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')){
            $posts = Post::orderBy('created_at', 'desc')->get();
        }else{
            $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('pages.backsite.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.backsite.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);
        
        
  
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = Str::slug($request->title);
        $post->image = $request['image'];
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;


        $post['image'] = isset($post['image']) ? $request->file('image')->store('assets/image-post', 'public') : "";
        $post->save();

        alert()->success('Success', 'Post created successfully.');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 404
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('pages.backsite.post.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['image'] = isset($data['image']) ? $request->file('image')->store('assets/image-post', 'public') : $post->image;
        // delete image on storage
        \Storage::disk('public')->delete($post->image);
        $post->update($data);

        alert()->success('Success', 'Post updated successfully.');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete on db and storage
        // delete image on storage
        \Storage::disk('public')->delete($post->image);
        // warning alert
        $post->delete();
        // success alert
        alert()->success('Success', 'Post deleted successfully.');
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
