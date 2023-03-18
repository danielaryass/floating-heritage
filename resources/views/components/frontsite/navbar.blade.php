<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
      <a href="{{route('home')}}" class="navbar-brand"> Floating Heritage<span class="text-primary"> Festival</span></a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Home</a>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Art
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('Teater')}}">Teater</a>
              <a class="dropdown-item" href="{{route('Film')}}">Film</a>
              <a class="dropdown-item" href="{{route('Tari')}}">Tari</a>
              <a class="dropdown-item" href="{{route('Musik')}}">Musik</a>
              <a class="dropdown-item" href="{{route('Fotografi')}}">Fotografi</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Literacy
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('Cerita')}}">Cerita</a>
              <a class="dropdown-item" href="{{route('Komik')}}">Komik</a>
              <a class="dropdown-item" href="{{route('Fotobook')}}">Fotobook</a>
            </div>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Culture
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('Lingkungan')}}">Lingkungan</a>
              <a class="dropdown-item" href="{{route('Masyarakat')}}">Masyarakat</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Entrepreneurship
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('UsahaPelakuPesisir')}}">Usaha Pelaku Pesisir</a>
            </div>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Games
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('Edukasi')}}">Edukasi</a>
              <a class="dropdown-item" href="{{route('Hiburan')}}">Hiburan</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li> 
        </ul>
      </div>

    </div>
  </nav>