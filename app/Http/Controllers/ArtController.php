<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ArtController extends Controller
{
    public function teater()
    {
        // show post with and when category is teater and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'art');
        })->orderBy('created_at', 'desc')->paginate(1);
        return view('pages.frontsite.art.teater', compact('posts'));
    }
}
