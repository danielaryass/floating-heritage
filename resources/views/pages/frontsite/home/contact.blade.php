@extends('layouts.front')
@section('title', 'Contact')
@section('content')
<div class="container">
    <div class="page-banner" style="background-image: url({{asset('frontsite/assets/img/bg_pattern.svg')}});">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
          <nav aria-label="Breadcrumb">
            <ul class="breadcrumb justify-content-center py-0 bg-transparent">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
            </ul>
          </nav>
          <h1 class="text-center">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="page-section">
  <div class="container">
    <div class="row text-center align-items-center">
      <div class="col-lg-4 py-3">
        <div class="display-4 text-center text-primary"><span class="mai-pin"></span></div>
        <p class="mb-3 font-weight-medium text-lg">Address</p>
        <p class="mb-0 text-secondary">Jl. Buah Batu No.212, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265, Indonesia</p>
      </div>
      <div class="col-lg-4 py-3">
        <div class="display-4 text-center text-primary"><span class="mai-call"></span></div>
        <p class="mb-3 font-weight-medium text-lg">Phone</p>
        <p class="mb-0"><a href="#" class="text-secondary">+62 8232 3235 324</a></p>
        <p class="mb-0"><a href="#" class="text-secondary">(021) 1122 3344 55</a></p>
      </div>  
      <div class="col-lg-4 py-3">
        <div class="display-4 text-center text-primary"><span class="mai-mail"></span></div>
        <p class="mb-3 font-weight-medium text-lg">Email Address</p>
        <p class="mb-0"><a href="#" class="text-secondary">fhfestival20@gmail.com</a></p>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <form action="#" class="contact-form py-5 px-lg-5">
          <h2 class="mb-4 font-weight-medium text-secondary">Suggestions</h2>
          <div class="row form-group">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="text-black" for="fname">First Name</label>
              <input type="text" id="fname" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="text-black" for="lname">Last Name</label>
              <input type="text" id="lname" class="form-control">
            </div>
          </div>
  
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="email">Email</label>
              <input type="email" id="email" class="form-control">
            </div>
          </div>
  
          <div class="row form-group">
  
            <div class="col-md-12">
              <label class="text-black" for="subject">Subject</label>
              <input type="text" id="subject" class="form-control">
            </div>
          </div>
  
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="message">Message</label>
              <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write your notes or questions here..."></textarea>
            </div>
          </div>
  
          <div class="row form-group mt-4">
            <div class="col-md-12">
              <input type="submit" value="Send Message" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 px-0">
<div id="map-container-google-2" class="z-depth-1-half map-container" style="margin: 115px">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.562355322627!2d107.62280012533208!3d-6.9427898412479845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e866a7f8413d%3A0x8e0b2d7621853826!2sInstitut%20Seni%20Budaya%20Indonesia%20Bandung!5e0!3m2!1sid!2sid!4v1678963530016!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

      </div>
    </div>
  </div>
</div>
@endsection