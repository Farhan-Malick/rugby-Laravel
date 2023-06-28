<header class="site-navbar py-4" role="banner">

    <div class="container">
      <div class="d-flex align-items-center">
        <div class="site-logo">
          <a href="index.html">
            <h2><a href="{{URL('/')}}" class="nav-link">RUGBY</a></h2>
            {{-- <img src="{{asset('assets/images/logo.png')}}" alt="Logo"> --}}
          </a>
        </div>
        <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li class="active"><a href="{{URL('/')}}" class="nav-link">Home</a></li>
                    <li><a href="{{URL('/matches')}}" class="nav-link">Matches</a></li>
                    <li><a href="{{URL('/players')}}" class="nav-link">Players</a></li>
                    {{-- <li><a href="blog.html" class="nav-link">Blog</a></li> --}}
                    <li><a href="{{URL('/contact')}}" class="nav-link">Contact</a></li>

                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li><a href="{{URL('/login')}}" class="nav-link">Login</a></li>
                        <li><a href="{{URL('/register')}}" class="nav-link">Register</a></li>

                    @endif
                </ul>
            </nav>


          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
              class="icon-menu h3 text-white"></span></a>
        </div>
      </div>
    </div>
  </header>
