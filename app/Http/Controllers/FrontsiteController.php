<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontsiteController extends Controller
{
    //
    public function home()
    {
        // get post recent 9
        $posts = Post::orderBy('created_at', 'desc')->take(9)->get();
        return view('pages.frontsite.home.home', compact('posts'));
    }
    public function show($slug)
    {
        // get post by slug
        $post = Post::where('slug', $slug)->first();
        // create recent post 3
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        // create popular post 3
        $popularPosts = Post::orderBy('page_views', 'desc')->take(3)->get();
        // increment page view if user go to post
        $post->increment('page_views');

        return view('pages.frontsite.post.show', compact('post', 'recentPosts', 'popularPosts'));
    }
    public function contact()
    {
        return view('pages.frontsite.home.contact');
    }
}
