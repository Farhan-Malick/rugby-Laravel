<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <h2><a href="{{ URL('/') }}" class="nav-link text-white">RUGBY</a></h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto text-right">
                <li class="active text-white"><a href="{{URL('/')}}" class="nav-link text-white">Home</a></li>
                <li><a href="{{URL('/matches')}}" class="nav-link text-white">Matches</a></li>
                <li><a href="{{URL('/players')}}" class="nav-link text-white">Players</a></li>
                {{-- <li><a href="blog.html" class="nav-link text-white">Blog</a></li> --}}
                <li><a href="{{URL('/contact')}}" class="nav-link text-white">Contact</a></li>

                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
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
                        @if(auth()->user()->account_type === 'admin')
                            <a href="{{ URL('/Admin-Rugby-Portal') }}" class="nav-link">Dashboard</a>
                        @endif
                        <a href="{{URL('/profile')}}" class="nav-link">Profile</a>
                        <a href="{{URL('/myPicks')}}" class="nav-link">My Picks</a>
                    </div>
                </li>
                @else
                <li><a href="{{URL('/login')}}" class="nav-link text-white">Login</a></li>
                <li><a href="{{URL('/register')}}" class="nav-link text-white">Register</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>
