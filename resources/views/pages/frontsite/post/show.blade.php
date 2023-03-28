@extends('layouts.front')
@section('title', $post->title)
@php
$content = $post->content;
$text = strip_tags($content);
$description = substr($text, 0, 160);
$description = substr($description, 0, strrpos($description, ' ')) . '...';
@endphp
@section('meta-description')
<meta name="description" content="{{$description}}">
<meta property="og:description" content="{{$description}}">
<meta property="og:image" content="{{ url(Storage::url($post->image)) }}">
<meta property="og:url" content="{{route('ShowPost', $post->slug)}}">
<meta property="og:title" content="{{$post->title}}">
<meta property="og:type" content="article">
<meta property="og:site_name" content="Floating Heritage Festival">
<meta property="article:published_time" content="{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('Y-m-d H:i:s') }}">
<meta property="article:modified_time" content="{{ \Illuminate\Support\Carbon::parse($post->updated_at)->format('Y-m-d H:i:s') }}">
<meta property="article:section" content="{{$post->category->name}}">
<meta property="article:tag" content="{{$post->category->name}}">
<meta property="article:author" content="{{$post->user->name}}">
@endsection
@section('title', $description)
@section('content')
<div class="page-section pt-5">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="teater.html">{{$post->category->name}}</a></li>
        </ul>
      </nav>
      
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-single-wrap">
            <div class="header">
              <div class="post-thumb">
                <img src="{{ url(Storage::url($post->image)) }}" alt="{{$post->title}}" style="">
              </div>
            </div>
            <h1 class="post-title">{{$post->title}} </h1>
            <div class="post-meta">
              <div class="post-date">
                <span class="icon">
                  <span class="mai-time-outline"></span>
                </span> {{ \Illuminate\Support\Carbon::parse($post->created_at)->format('F d, Y') }}
              </div>
              <div class="post-comment-count ml-2">
                <span class="icon">
                  <span class="mai-person"></span>
                </span> <a href="#"> {{$post->user->name}}</a>
              </div>
            </div>
            <div class="post-content">
              {!! $post->content !!}
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="widget">
         
            <!-- Widget recent post -->
            <div class="widget-box">
              <h4 class="widget-title">Recent Post</h4>
              <div class="divider"></div>
              @foreach($recentPosts as $recent)
              <div class="blog-item">
                  <a class="post-thumb" href="{{route('ShowPost', $recent->slug)}}">
                    <img src="{{ url(Storage::url($recent->image)) }}" alt="">
                  </a>
                  <div class="content">
                    <h6 class="post-title"><a href="{{route('ShowPost', $recent->slug)}}">{{ \Illuminate\Support\Str::limit($recent->title, 40, '...') }}
                    </a></h6>
                    <div class="meta">
                      <a href="{{route('ShowPost', $recent->slug)}}"><span class="mai-calendar"> {{ \Illuminate\Support\Carbon::parse($recent->created_at)->format('d F Y g:i A') }}
                      </span> </a>
                      <br>
                      <a href="#"><span class="mai-person"></span> {{$recent->user->name}} </a>
                    </div>
                  </div>
              </div>
            @endforeach
            </div>
            <div class="widget-box">
              <h4 class="widget-title">Populer Post</h4>
              <div class="divider"></div>
              @foreach($popularPosts as $popular)
              <div class="blog-item">
                <a class="post-thumb" href="{{route('ShowPost', $popular->slug)}}">
                  <img src="{{ url(Storage::url($popular->image)) }}" alt="">
                </a>
                <div class="content">
                  <h6 class="post-title"><a href="{{route('ShowPost', $popular->slug)}}">{{ \Illuminate\Support\Str::limit($popular->title, 40, '...') }}
                  </a></h6>
                  <div class="meta">
                    <a href="{{route('ShowPost', $popular->slug)}}"><span class="mai-calendar"> {{ \Illuminate\Support\Carbon::parse($popular->created_at)->format('d F Y g:i A') }}
                    </span> </a>
                    <br>
                    <a href="#"><span class="mai-person"></span> {{$popular->user->name}} </a>
                  </div>
                </div>
            </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection