@extends('layouts.front')
@section('title', 'Tari')
@section('meta-description')
<meta name="description" content="Tari">
<meta property="og:description" content="Tari">
<meta property="description" content="Tari">
<meta property="og:url" content="{{route('Tari')}}">
<meta property="og:title" content="Tari | Floating Herritage Festival">
@endsection
@section('content')
<div class="container">
    <div class="page-banner" style="background-image: url({{asset('frontsite/assets/img/bg_pattern.svg')}});" >
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <h1 class="text-center">Tari</h1>
        </div>
      </div>
    </div>
</div>
<div class="page-section">
    <div class="container">
      <div class="row my-5">
        @forelse($posts as $post)
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <a href="{{route('ShowPost', $post->slug)}} ">
                    <img src="{{ url(Storage::url($post->image)) }}" alt="{{$post->title}}" style="width:100%;">
              </div>
            </div>
            <div class="body">
                <h5 class="post-title"><a href="{{route('ShowPost', $post->slug)}}">{{ \Illuminate\Support\Str::limit($post->title, 40, '...') }}</a></h5>
                <div class="post-date">Posted on {{$post->created_at->diffForHumans()}}</div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-12 text-center">
          <p>No Post</p>  
        </div>
        @endforelse
      </div>



      {{ $posts->links() }}
    
      
      

      

    </div>
  </div>

@endsection
