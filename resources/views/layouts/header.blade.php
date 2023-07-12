<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
<!-- Include animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<header class="site-navbar py-4" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <h2><a href="{{URL('/')}}" class="nav-link">RUGBY</a></h2>
                {{-- <img src="{{asset('assets/images/logo.png')}}" alt="Logo"> --}}
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="{{URL('/')}}" class="nav-link"
                                style=" transition: background-color 0.3s ease;">Home</a></li>
                        <li><a href="{{URL('/matches')}}" class="nav-link">Matches</a></li>
                        <li><a href="{{URL('/players')}}" class="nav-link">Players</a></li>
                        <li><a href="{{URL('/contact')}}" class="nav-link">Contact</a></li>

                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a href="{{URL('/profile')}}" class="dropdown-item nav-link">Profile</a>
                                <a href="{{URL('/myPicks')}}" class="dropdown-item nav-link">My Picks</a>
                            </div>
                        </li>
                        @else
                        <li><a href="{{URL('/login')}}" class="nav-link">Login</a></li>
                        <li><a href="{{URL('/register')}}" class="nav-link">Register</a></li>
                        @endif
                    </ul>
                </nav>

                <a href="#"
                    class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white">
                    <span class="icon-menu h3 text-white"></span>
                </a>
            </div>

            <script>
                $(document).ready(function() {
                    // Add ease-out animation on hover
                    $('.site-menu .nav-link').hover(
                        function() {
                            $(this).addClass('animate__animated animate__fadeIn');
                        },
                        function() {
                            $(this).removeClass('animate__animated animate__fadeIn');
                        }
                    );
                });
            </script>


        </div>
    </div>
</header>