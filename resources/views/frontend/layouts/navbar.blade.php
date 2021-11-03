<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5" id="navbar">
  <div class="container">
    <a class="navbar-brand me-5" href="/">AK</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav d-flex justify-content-between mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('article*') ? 'active' : '' }}" href="/article">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">Tentang Kami</a> 
        </li>
      </ul>
      @can('auth')
      <div class="ms-auto">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>
      @endcan
      <div class="ms-auto">
          <a href="/login" class="btn btn-light px-4 py-2 fw-bolder" id="btn-login"> Login</a>
      </div>
    </div>
  </div>
</nav>





  