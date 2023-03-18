@extends('layouts.front')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="page-banner home-banner"style="background-image: url({{asset('frontsite/assets/img/bg_pattern.svg')}});">
      <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
          <h1 class="mb-4">Let's Join Us!</h1>
          <p class="text-lg text-white mb-5">Ruang apresiasi dan literasi yang merepresentasikan pengetahuan berdasarkan riset dan penciptaan produk melalui proses pengalaman kajian terhadap fakta-fakta yang diartikulasikan dengan perspektif metodologis.</p>
          <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span class="mai-play"></span></div></a>
        </div>
        <div class="col-md-6 py-5 wow zoomIn">
          <div class="img-fluid text-center">
            <img src="{{asset('frontsite/assets/img/maritime.png')}}" alt="">
          </div>
        </div>
      </div>
      <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down" style="color:black;"></span></a>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="{{asset('frontsite/assets/img/services/icon-1.webp')}}" alt="" style="width: 38%;">
            </div>
            <div class="body">
              <h5 class="text-secondary">Consultancy</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="{{asset('frontsite/assets/img/services/icon-2.webp')}}" alt="" style="width: 38%;">
            </div>  
            <div class="body">
              <h5 class="text-secondary">Artikel Pendidikan</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="{{asset('frontsite/assets/img/services/service-3.svg')}}" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Jurnal</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead">About</span>
          <h2 class="title-section">Floating Heritage Festival</h2>
          <div class="divider"></div>

          <p>Floating Heritage Festival adalah sebuah festival yang diadakan untuk memperingati warisan budaya yang terkait dengan tradisi pelayaran di sebuah wilayah atau negara. Festival ini biasanya diadakan di lokasi yang dekat dengan air atau laut, seperti pelabuhan atau pantai.</p>
          <p>Pada festival ini, biasanya diadakan berbagai acara dan pertunjukan yang menampilkan budaya dan tradisi pelayaran yang khas dari wilayah atau negara tersebut. Acara yang biasanya diadakan antara lain parade kapal tradisional, pertunjukan tari dan musik, serta berbagai aktivitas terkait pelayaran seperti perlombaan perahu atau regata.</p>
          <p>Floating Heritage Festival menjadi salah satu cara untuk mempromosikan dan melestarikan warisan budaya yang terkait dengan tradisi pelayaran, serta menjadi ajang untuk memperkenalkan keindahan dan kekayaan budaya dari suatu wilayah atau negara kepada masyarakat luas.</p>
          <a href="#" class="btn btn-primary mt-3">Read More</a>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="{{asset('frontsite/assets/img/gambar-1.webp')}}" alt="Floating Heritage Festival" style="width: 100%;">
          </div>
        </div>
      </div>
    </div> 
  </div> 
  <div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url({{asset('frontsite/assets/img/bg_pattern.svg')}});">
      <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
          <div class="col-lg-8">
            <h2 class="mb-4">Cari Artikel yang kamu mau</h2>
            <form action="#">
              <input type="text" class="form-control" placeholder="E.g google.com">
              <button type="submit" class="btn btn-success">Check Now</button>
            </form>
          </div>
        </div>
      </div> 
    </div> 
  </div> 
  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="col-lg-4 py-3">
          <div class="d-inline p-2 bg-primary text-white" style="margin-left: 23px;">Artikel Terbaru</div>
        </div>
      </div>  
      </div>

      <div class="row my-3">
        @forelse ($posts as $post)
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <a href="{{route('ShowPost', $post->slug)}} ">
                <img src="{{ url(Storage::url($post->image)) }}" alt="{{$post->title}}" style="width:100%;">
                </a>
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

    </div>
  </div>
@endsection