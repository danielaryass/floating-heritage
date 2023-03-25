<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="{{asset("/backsite/assets/images/favicon.webp")}}">
  @yield('meta-description')
  <title>@yield('title') | Floating Herritage Festival</title>

  @stack('before-styles')
  @include('includes.frontsite.style')
  @stack('after-styles')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    @include('components.frontsite.navbar')
  </header>
  @yield('content')
  @include('components.frontsite.footer')
@stack('before-script')
@include('includes.frontsite.script')
@stack('after-script')
  
</body>
</html>