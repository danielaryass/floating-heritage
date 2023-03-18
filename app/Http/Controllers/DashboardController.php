<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// panggil model 
use App\Models\{User, Post, Category};

class DashboardController extends Controller
{
    public function index()
    {
        // menghitung jumlah user & post & category
        $post = Post::count();
        // post page views for user login
        $post_views = Post::where('user_id', auth()->user()->id)->sum('page_views');
  
        return view('pages.backsite.dashboard.index', compact('post', 'post_views'));
    }
}
