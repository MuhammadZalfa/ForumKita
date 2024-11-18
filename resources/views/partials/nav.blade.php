<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <div class="container flex justify-content-between">
      <a class="navbar-link" href="{{ route('home') }}">
        <img class="h-32px" src="{{ url('assets/images/ForumKita.png') }}" alt="Forum Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-0 mx-lg-3">
          <li class="nav-item d-block d-lg-none d-xl-block">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
            <a class="nav-link" href="{{ route('diskusi.index') }}">Diskusi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-nowrap" href="">Tentang Kita</a>
          </li>
        </ul>
        <form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="{{ route('diskusi.index') }}" method="GET">
          <div class="input-group">
              <span class="input-group-text bg-white border-end-0" id="basic-addon1">
                  <img src="{{ url('assets/images/magnifier.png') }}" alt="search">
              </span>
              <input class="form-control border-start-0 ps-0" type="search" 
                    placeholder="Search" 
                    aria-label="Search" 
                    name="search" 
                    value="{{ $search ?? '' }}">
          </div>
      </form>
        <ul class="navbar-nav ms-auto my-2 my-lg-0">
        @auth
        <li class="nav-item my-auto dropdown">
          <a class="nav-link p-0 d-flex align-items-center justify-content-center" href="javascript:;" data-bs-toggle="dropdown">
            <div class="avatar-nav-wrapper me-2 d-flex align-items-center">
              <img src="{{ filter_var(auth()->user()->picture, FILTER_VALIDATE_URL) ? auth()->user()->picture : Storage::url(auth()->user()->picture) }}" 
                  alt="{{ auth()->user()->username }}" class="avatar rounded-circle">
              <span class="fw-bold ms-2">
                {{ Auth::user()->username }}
              </span>
            </div>
          </a>
          <ul class="dropdown-menu mt-2">
            <li>
              <a class="dropdown-item" href="">My Profile</a>
            </li>
            <li>
              <form action="{{ route('auth.login.logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Log Out</button>
              </form>
            </li>
          </ul>
        </li>        
        @endauth
        @guest
          <li class="nav-item my-auto">
            <a class="nav-link text-nowrap {{ Route::currentRouteName() == 'auth.login.login' ? 'active' : ''}}" href="{{ route('auth.login.login')}}">Sign in</a>
          </li>
          <li class="nav-item ps-1 pe-0">
            <a class="btn btn-primary-white" href="{{ route('auth.sign-up.sign-up')}}">Sign Up</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
</nav>