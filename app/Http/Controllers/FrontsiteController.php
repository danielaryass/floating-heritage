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

    // Controller For Art
    public function teater()
    {
        // show post with and when category is teater and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'teater');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.art.teater', compact('posts'));
    }
    // create for film
    public function film()
    {
        // show post with and when category is film and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'film');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.art.film', compact('posts'));
    }
    // create for musik
    public function musik()
    {
        // show post with and when category is musik and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'musik');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.art.musik', compact('posts'));
    }
    // create for tari
    public function tari()
    {
        // show post with and when category is tari and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'tari');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.art.tari', compact('posts'));
    }
    // create for fotografi
    public function fotografi()
    {
        // show post with and when category is fotografi and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'fotografi');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.art.fotografi', compact('posts'));
    }
    // Controller For Literacy
    public function cerita()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'cerita');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.literacy.cerita', compact('posts'));
    }
    public function komik()
    {
        // show post with and when category is komik and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'komik');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.literacy.komik', compact('posts'));
    }
    public function fotobook()
    {
        // show post with and when category is fotobook and paginate 9
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'fotobook');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.literacy.fotobook', compact('posts'));
    }
    // Controller For Culture
    public function lingkungan()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'lingkungan');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.culture.lingkungan', compact('posts'));
    }
    public function masyarakat()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'masyarakat');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.culture.masyarakat', compact('posts'));
    }
    // Controller For entrepreneur
    // usaha pelaku pesisir
    public function usahapelaku()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'usaha pelaku pesisir');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.entrepreneurship.usaha', compact('posts'));
    }
    // create for Games
    public function edukasi()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'edukasi');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.games.edukasi', compact('posts'));
    }
    public function hiburan()
    {
        $posts = Post::whereHas('category', function ($query) {
            $query->where('name', 'hiburan');
        })->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.frontsite.games.hiburan', compact('posts'));
    }
 
}
