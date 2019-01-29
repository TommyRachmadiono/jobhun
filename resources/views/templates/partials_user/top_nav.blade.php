<div id="menu">
  <nav class="navbar-wrapper navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-themers">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand site-name" href="#top"><img src="{{ asset('user/images/logo.png') }}" alt="logo"></a>
      </div>

      <div id="navbar-scroll" class="collapse navbar-collapse navbar-themers navbar-right">
        <ul class="nav navbar-nav">
          <li @if($seg1 == '') class="active" @endif><a href="{{ route('user_home') }}">Beranda</a></li>
          {{-- <li><a href="#intro">About</a></li>
          <li><a href="#feature">Features</a></li> 
          <li><a href="#screenshot">Screenshots</a></li>
          <li><a href="#clients">Clients</a></li>
          <li><a href="#package">Package</a></li>
          <li><a href="#download">Download</a></li> --}}
          <li @if($seg1 == 'blog') class="active" @endif><a href="{{ route('all_blog') }}">Artikel</a></li>
          <li @if($seg1 == 'about-us') class="active" @endif><a href="{{ route('about_us') }}">Tentang Kami</a></li>
        </div>
      </div>
    </nav>
  </div>